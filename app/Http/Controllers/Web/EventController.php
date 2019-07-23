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

    public function index()
    {
        $data['listEvent'] = $this->eventModel->getAllEvents(0);
        return view('web.event.events',$data);
    }

    public function loadMoreEvent(Request $request){
        $pageIndex = $request->get('index');
        $listEvent = $this->eventModel->getAllEvents($pageIndex);
        return response()->json(['listEvent' =>$listEvent],200);
    }
}
