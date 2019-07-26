<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\Category;
use App\Models\Web\Project;
use Illuminate\Http\Request;

class ShowHomeController extends Controller
{
    public function __construct(Category $category, Project $project)
    {
        $this->category = $category;
        $this->project = $project;
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
        if ($request->ajax()) {
            $valueCategory = $request->category_id;
            $listProjects = $this->project->where('category_id', $valueCategory)->paginate(6);
            $view = view('data_projectIndex_loadmore', compact('listCategory', 'listProjects', 'valueCategory'))->render();
            return response()->json(['html' => $view]);
        }
        return view('web.index', compact('listCategory'));
    }
}
