<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Background;
use App\Models\Web\Category;
use App\Models\Web\CoWorking;
use App\Models\Web\Event;
use App\Models\Web\Project;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowHomeController extends Controller
{
    private $category, $project, $event, $config, $coWorking;

    public function __construct(Event $event, Category $category, Project $project, CoWorking $coWorking, Background $background)
    {
        $this->category = $category;
        $this->project = $project;
        $this->event = $event;
        $this->coWorking = $coWorking;
        $this->config = Helpers::getConfig()['HomePage'];
        $this->background = $background;
    }

    /**
     * Load Our Project by ajax
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request)
    {

        $listCoworking = $this->coWorking->getAllCoworking();
        $listEvent = $this->event->getAllEvents($this->config['listEventPaginate']);
        $listCategoryProject = $this->category->getCategoryProject();
        $listBackground = $this->background->getBackgroundHome();
        if ($request->ajax()) {
            $valueCategory = $request->get('category_id');
            $listProjects = $this->project->getProjectByCategory($valueCategory);
            $view = view('data_projectIndex_loadmore', compact('listCategoryProject', 'listProjects', 'valueCategory'))->render();
            return response()->json(['html' => $view]);
        }
        return view('web.index', compact('listEvent', 'listCoworking', 'listCategoryProject','listBackground'));
    }

    /**
     * Search project by Keyword and Sort Category
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable\
     */
    public function searchProject(Request $request)
    {
        $listProjects = $this->project->getProjectSearch($request);
        if ($request->ajax()) {
            $view = view('data_projectIndex_loadmore', compact('listProjects'))->render();
            return response()->json(['html' => $view]);
        }
        return view('web.project.project_search', compact('listProjects'));
    }
}
