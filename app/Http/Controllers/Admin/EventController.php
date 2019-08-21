<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Admin\Background;
use App\Models\Admin\Event;
use Helpers;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    private $event, $background;

    public function __construct(Event $event, Background $background)
    {
        $this->event = $event;
        $this->background = $background;
    }

    /**
     * load list event and load more
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function showListEvent(Request $request)
    {
        if ($request->ajax()) {
            $listEvent = $this->event->getAllEvents();
            return Datatables::of($listEvent)
                ->editColumn('image_link', function ($event) {
                    $image = Helpers::$URL_THUMBNAIL.$event->image_link;
                    return '<img src="' . $image . '" alt="image" class="img-thumbnail">';
                })
                ->editColumn('begin_time', function ($event) {
                    return date_format(date_create($event->begin_time),'G:i A');
                })
                ->editColumn('end_time', function ($event) {
                    return date_format(date_create($event->end_time),'G:i A');
                })
                ->addColumn('setBackgroundEvent', function ($event) {
                    $background = $this->background->getBackgroundEvent();
                    if ($event->image_link == $background->image_link) {
                        $data = '<input id="set_background" checked onclick="setImageBackground(' . "'.$event->image_link'" . ')" name="event_background" value="' . $event->image_link . '" type="radio">';
                    } else {
                        $data = '<input id="set_background"  name="event_background" onclick="setImageBackground(' . "'$event->image_link'" . ')" value="' . $event->image_link . '" type="radio">';
                    }

                    return $data;
                })
                ->addColumn('feature', function ($event) {
                    $data = '<a onclick="showModelDeleteEvent(' . "'$event->id'" . ')" href="javascript:">
                            <img style="width: 25px; height: 25px;" src="https://image.flaticon.com/icons/png/128/61/61848.png" alt="">
                        </a>' .
                        ' ||&nbsp; <a href="' . route('view.admin.event.edit', $event->id) . '">
                            <img style="width: 25px; height: 25px;" src="https://png.pngtree.com/svg/20151211/af2c28659c.svg" alt="">
                        </a>';
                    return $data;
                })
                ->rawColumns(['image_link', 'feature', 'setBackgroundEvent'])
                ->make();
        }
        return view('admin.event.event_list')->with('title', 'List Event');
    }

    /**
     * Show add event view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddNewEvent()
    {
        return view('admin.event.addnew')->with('title', 'Add New Event');;
    }

    public function showEditEvent($id)
    {
        try {
            $event = $this->event->getEventById($id);
            return view('admin.event.edit', compact('event'))->with('title', 'Edit Event');;
        } catch (Exception $e) {
            return redirect()->route('view.admin.event.event_list');
        }

    }

    /**
     * Delete event by id
     * @param Request $request id event
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEventById(Request $request)
    {
        $id = $request->get('id');
        $event = $this->event->getEventById($id);
        if ($this->event->deleteEventById($id) == 1) {
            Helpers::deleteImageFromCDN($event->image_link);
            Log::info('delete event success');
            return response()->json(['status' => 'success'], Response::HTTP_OK);
        } else {
            Log::info('delete event failed');
            return response()->json(['status' => 'fail'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * add new event into database
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNewEvent(EventRequest $request)
    {

        $name = $request->get('name');
        $jp_name = $request->get('jp_name');
        $sort_description = $request->get('sort_description');
        $jp_sort_description = $request->get('jp_sort_description');
        $overview = $request->get('overview');
        $jp_overview = $request->get('jp_overview');
        $location = $request->get('location');
        $jp_location = $request->get('jp_location');
        $date_time = $request->get('date_time');
        $begin_time = $request->get('begin_time');
        $end_time = $request->get('end_time');
        $imageFile = $request->file('image_link');
        $position = $request->get('position');

        $facebook = $request->get('facebook');
        $messanger = $request->get('messanger');
        $telegram = $request->get('telegram');
        $twitter = $request->get('twitter');
        $instagram = $request->get('instagram');

        //convert array location to json
        $location_json = json_encode($location, true);
        $location_json_jp = json_encode($jp_location, true);

        //convert array socical to json
        $socical_link_json = json_encode(
            array
            (
                'fb.png' => $facebook,
                'ms.png' => $messanger,
                'share.png' => $telegram,
                'twice.png' => $twitter,
                'in.png' => $instagram
            ), true);

        //modify time
        $begin_time = $date_time . ' ' . $begin_time;
        $end_time = $date_time . ' ' . $end_time;
        //format time to sql
        $begin_time = date_format(date_create($begin_time), 'Y-m-d H:i:s');
        $end_time = date_format(date_create($end_time), 'Y-m-d H:i:s');

        //upload image to cdn and get url
        $newNameImage = Helpers::createNewNameImage($imageFile->getClientOriginalName());
        $this->uploadImageToCDN($newNameImage,$imageFile);

        $this->insertEventSql($name, $jp_name, $sort_description, $jp_sort_description,
            $overview, $jp_overview, $location_json, $location_json_jp,
            $date_time, $begin_time, $end_time, $newNameImage, $position, $socical_link_json);

        return redirect()->route('view.admin.event.event_list')->with('message', 'Add New Event Success');
    }

    /**
     * insert event into database
     * @param $name
     * @param $jp_name
     * @param $sort_description
     * @param $jp_sort_description
     * @param $overview
     * @param $jp_overview
     * @param $location_json
     * @param $location_json_jp
     * @param $date_time
     * @param $begin_time
     * @param $end_time
     * @param $imageLinkCDN
     * @param $position
     * @param $socical_link_json
     * @return \Illuminate\Http\RedirectResponse
     */
    private function insertEventSql($name, $jp_name, $sort_description, $jp_sort_description,
                                 $overview, $jp_overview, $location_json, $location_json_jp,
                                 $date_time, $begin_time, $end_time, $imageLinkCDN, $position, $socical_link_json)
    {
        if ($this->event->addNewEvent($name, $jp_name, $sort_description, $jp_sort_description,
                $overview, $jp_overview, $location_json, $location_json_jp,
                $date_time, $begin_time, $end_time, $imageLinkCDN, $position, $socical_link_json) == true) {
            Log::info('add event success');


        } else {
            Log::info('add event failed');

        }
    }

    /**
     * update event by id
     * @param EventRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEvent(EventRequest $request, $id)
    {
        $name = $request->get('name');
        $jp_name = $request->get('jp_name');
        $sort_description = $request->get('sort_description');
        $jp_sort_description = $request->get('jp_sort_description');
        $overview = $request->get('overview');
        $jp_overview = $request->get('jp_overview');
        $location = $request->get('location');
        $jp_location = $request->get('jp_location');
        $date_time = $request->get('date_time');
        $begin_time = $request->get('begin_time');
        $end_time = $request->get('end_time');
        $position = $request->get('position');
        $facebook = $request->get('facebook');
        $messanger = $request->get('messanger');
        $telegram = $request->get('telegram');
        $twitter = $request->get('twitter');
        $instagram = $request->get('instagram');

        //convert array location to json
        $location_json = json_encode($location, true);
        $location_json_jp = json_encode($jp_location, true);

        //convert array socical to json
        $socical_link_json = json_encode(
            array
            (
                'fb.png' => $facebook,
                'ms.png' => $messanger,
                'share.png' => $telegram,
                'twice.png' => $twitter,
                'in.png' => $instagram
            ), true);

        //modify time
        $begin_time = $date_time . ' ' . $begin_time;
        $end_time = $date_time . ' ' . $end_time;
        //format time to sql
        $begin_time = date_format(date_create($begin_time), 'Y-m-d H:i:s');
        $end_time = date_format(date_create($end_time), 'Y-m-d H:i:s');

        $linkImageSaveSql = '';
        //upload image to cdn and get url
        if ($request->hasFile('image_link')) {
            $imageFile = $request->file('image_link');
            $newNameImage = Helpers::createNewNameImage($imageFile->getClientOriginalName());
            $linkImageSaveSql = $newNameImage;
            $this->uploadImageToCDN($newNameImage,$imageFile);
        } else {
            $image_old = $request->get('image_display');
            $linkImageSaveSql = $image_old;
        }

        $this->updateEventSql($id, $name, $jp_name, $sort_description, $jp_sort_description,
            $overview, $jp_overview, $location_json, $location_json_jp,
            $date_time, $begin_time, $end_time, $linkImageSaveSql, $position, $socical_link_json);

        return redirect()->route('view.admin.event.event_list')->with('message', 'Update Event Success');
    }

    /**
     * update event into database
     * @param $id
     * @param $name
     * @param $jp_name
     * @param $sort_description
     * @param $jp_sort_description
     * @param $overview
     * @param $jp_overview
     * @param $location_json
     * @param $location_json_jp
     * @param $date_time
     * @param $begin_time
     * @param $end_time
     * @param $linkImageSaveSql
     * @param $position
     * @param $socical_link_json
     */
    private function updateEventSql($id, $name, $jp_name, $sort_description, $jp_sort_description,
                                 $overview, $jp_overview, $location_json, $location_json_jp,
                                 $date_time, $begin_time, $end_time, $linkImageSaveSql, $position, $socical_link_json)
    {
        if ($this->event->updateEvent($id, $name, $jp_name, $sort_description, $jp_sort_description,
                $overview, $jp_overview, $location_json, $location_json_jp,
                $date_time, $begin_time, $end_time, $linkImageSaveSql, $position, $socical_link_json) == true) {
            Log::info('update event success');

        } else {
            Log::info('update event failed');

        }
    }

    /** update image event background in web
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setImageBackground(Request $request)
    {
        $image_link = $request->get('image_link');
        if ($this->background->updateBackground($image_link) == 1) {
            return response()->json(['status' => 'set background success'], Response::HTTP_OK);
        }
    }

    private function uploadImageToCDN($name,$imageFile){
       //for thumbnail
        $thubnail = Helpers::resizeImage($imageFile,1);
        Helpers::upLoadImageToCDNDetail_H($thubnail->content(),$name,1);

        //for detail
        $detail = Helpers::resizeImage($imageFile,2);
        Helpers::upLoadImageToCDNDetail_H($detail->content(),$name,2);

    }


}
