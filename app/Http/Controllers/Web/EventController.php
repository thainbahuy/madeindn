<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventModel;

    function __construct(Event $eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function index(Request $request)
    {
        $listEvent = $this->eventModel->getAllEvents();
        if ($request->ajax()) {
            $view = view('data_event_loadmore',compact('listEvent'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('web.event.events',compact('listEvent'));
    }

}
