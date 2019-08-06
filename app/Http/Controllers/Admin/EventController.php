<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
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

    public function deleteEventById(Request $request){
        $id = $request->get('id');
        if ($this->event->deleteEventById($id) == 1) {
            return response()->json(['status' => 'success'], Response::HTTP_OK);
        } else {
            return response()->json(['status' => 'fail'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
