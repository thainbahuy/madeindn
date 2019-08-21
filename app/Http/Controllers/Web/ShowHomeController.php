<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Background;
use App\Models\Web\Category;
use App\Models\Web\CoWorking;
use App\Models\Web\Event;
use App\Models\Web\Partner;
use App\Models\Web\Project;
use App\Models\Web\About;
use Helpers;
use Illuminate\Http\Request;

class ShowHomeController extends Controller
{
    private $category, $project, $event, $config, $coWorking, $background, $about,$partner;

    public function __construct(Event $event, Category $category, Project $project, CoWorking $coWorking,
                                Background $background, About $about,Partner $partner)
    {
        $this->category = $category;
        $this->project = $project;
        $this->event = $event;
        $this->coWorking = $coWorking;
        $this->config = Helpers::getConfig()['Home_Page'];
        $this->background = $background;
        $this->about = $about;
        $this->partner = $partner;
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
        $listEvent = $this->event->getAllEvents($this->config['Quantity Post Event']);
        $listCategoryProject = $this->category->getCategoryProject();
        $listBackground = $this->background->getBackgroundHome();
        $listAbout = $this->about->getAllAbout();
        $listPartner = $this->partner->getListBackground();
        $arrListProject = [];
        foreach($listCategoryProject as $value){
            $arrListProject[$value->id] = $this->project->getProjectByCategory($value->id)->paginate($this->config['Quantity Post Project']);
        }
        if ($request->ajax()) {
            $valueCategory = $request->get('category_id');
            $view = view('data_projectIndex_loadmore', compact('listCategoryProject', 'arrListProject', 'valueCategory'))->render();
            return response()->json(['html' => $view]);
        }
        return view('web.index', compact('listEvent', 'listCoworking', 'listCategoryProject', 'listBackground','listAbout','arrListProject','listPartner'));
    }

    /**
     * Search project by Keyword and Sort Category
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable\
     */
    public function searchProject(Request $request)
    {
        $listProjects = $this->project->getProjectSearch($request)->paginate(Helpers::getConfig()['Project_Search_Page']['Quantity Show Post Search Project']);
        if ($request->ajax()) {
            $view = view('data_projectIndex_loadmore', compact('listProjects'))->render();
            return response()->json(['html' => $view]);
        }
        return view('web.project.project_search', compact('listProjects'));
    }

}
