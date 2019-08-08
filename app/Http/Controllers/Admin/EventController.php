<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Admin\Event;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * load list event and load more
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function showListEvent(Request $request)
    {

        $listEvent = $this->event->getAllEvents(5);
        if ($request->ajax()) {
            $view = view('admin.event.loadmore_event_list', compact('listEvent'))->render();
            return response()->json(['html' => $view]);
        }
        return view('admin.event.event_list', compact('listEvent'));
    }

    /**
     * Show add event view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddNewEvent()
    {
        return view('admin.event.addnew');
    }

    public function showEditEvent(Request $request)
    {
        $id = $request->get('id');
        $event = $this->event->getEventById($id);
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Delete event by id
     * @param Request $request id event
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEventById(Request $request)
    {
        $id = $request->get('id');
        if ($this->event->deleteEventById($id) == 1) {
            return response()->json(['status' => 'success'], Response::HTTP_OK);
        } else {
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
        $image_link = $request->file('image_link');
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
        $imageLinkCDN = Helpers::upLoadImageToCDN($image_link);

        if ($this->event->addNewEvent($name, $jp_name, $sort_description, $jp_sort_description,
                $overview, $jp_overview, $location_json, $location_json_jp,
                $date_time, $begin_time, $end_time, $imageLinkCDN, $position, $socical_link_json) == true) {

            return redirect()->back()->with('message', 'Add New Event Success');

        } else {
            return redirect()->back()->with('message', 'Add New Event Failed');
        }


    }

    public function updateEvent(EventRequest $request)
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
        $image_link = $request->file('image_link');
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
        $imageLinkCDN = Helpers::upLoadImageToCDN($image_link);

//        if ($this->event->addNewEvent($name, $jp_name, $sort_description, $jp_sort_description,
//                $overview, $jp_overview, $location_json, $location_json_jp,
//                $date_time, $begin_time, $end_time, $imageLinkCDN, $position, $socical_link_json) == true) {
//
//            return redirect()->back()->with('message', 'Add New Event Success');
//
//        } else {
//            return redirect()->back()->with('message', 'Add New Event Failed');
//        }
    }


}
