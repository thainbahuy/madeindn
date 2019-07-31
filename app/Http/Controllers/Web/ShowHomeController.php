<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Category;
use App\Models\Web\Event;
use App\Models\Web\Project;
use Helpers;
use Illuminate\Http\Request;

class ShowHomeController extends Controller
{
    private $category, $project, $event, $config;

    public function __construct(Event $event, Category $category, Project $project)
    {
        $this->category = $category;
        $this->project = $project;
        $this->event = $event;
        $this->config = Helpers::getConfig()['HomePage'];

    }

    /**
     * Load Our Project by ajax
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $listCategory = $this->category->getAllCategory();
        $listEvent = $this->event->getAllEvents($this->config['listEventPaginate']);
        if ($request->ajax()) {
            $valueCategory = $request->get('category_id');
            $listProjects = $this->project->where('category_id', $valueCategory)->paginate(6);
            $view = view('data_projectIndex_loadmore', compact('listCategory', 'listProjects', 'valueCategory'))->render();
            return response()->json(['html' => $view]);
        }
        return view('web.index', compact('listCategory', 'listEvent'));
    }
}
