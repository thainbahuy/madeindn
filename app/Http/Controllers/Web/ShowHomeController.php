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

    public function index()
    {
        $listCategory = $this->category->getAllCategory();
        $listProject = $this->project->getAllProject();
        return view('web.index', compact('listCategory', 'listProject'));
    }
}
