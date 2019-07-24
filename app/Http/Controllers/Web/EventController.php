<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventModel;

    function __construct(Event $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    /**
     * Load event page and load more ajax
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $listEvent = $this->eventModel->getAllEvents();
        if ($request->ajax()) {
            $view = view('data_event_loadmore', compact('listEvent'))->render();
            return response()->json(['html' => $view]);
        }
        return view('web.event.events', compact('listEvent'));
    }

    /**
     * Load detail event by Id
     * @param $eventSlug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadEventDetail($eventSlug)
    {
        $eventSlug = explode('-', $eventSlug);
        $idEvent = $eventSlug[sizeof($eventSlug) - 1];
        $event = $this->eventModel->getEventById($idEvent);
        return view('web.event.events_detail', compact('event'));
    }


}
