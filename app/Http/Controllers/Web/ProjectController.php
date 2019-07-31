<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\Category;
use App\Models\Web\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    private $projectModel, $category;

    function __construct(Project $projectModel, Category $category)
    {
        $this->projectModel = $projectModel;
        $this->category = $category;
    }

    /**
     * Show Project By Category with Ajax
     * @param $name
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function showProjectByCategory($name, Request $request)
    {
        $CategoryByProject = $this->category->where('name', $name)->first();
        $listProjects = $this->projectModel->getProjectByCategory($CategoryByProject['id']);
        if ($request->ajax()) {
            $view = view('data_projectIndex_loadmore', compact('listProjects'))
                ->with('valueCategory', $CategoryByProject['id'])
                ->render();
            return response()->json(['html' => $view]);
        }

        return view('web.project.project_category', compact('listProjects'))
            ->with('title', ucwords($name))
            ->with('valueCategory', $CategoryByProject['id']);
    }

    /**
     * Show detail Project by Id
     * @param $name
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetailProject($name, $id)
    {
        $getProject = $this->projectModel->getProjectById($id);
        return view('web.project.project_detail', compact('getProject'))->with('title', ucwords($name));
    }
}
