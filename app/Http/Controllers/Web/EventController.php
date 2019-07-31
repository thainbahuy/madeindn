<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Event;
use Helpers;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventModel, $config;

    function __construct(Event $eventModel)
    {
        $this->eventModel = $eventModel;
        $this->config = Helpers::getConfig()['EventPage'];
    }

    /**
     * Load event page and load more ajax
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $listEvent = $this->eventModel->getAllEvents($this->config['listEventPaginate']);
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
        $socical_link = Helpers::convertToJson($event->social_link);
        return view('web.event.events_detail', compact('event', 'socical_link'));
    }
}