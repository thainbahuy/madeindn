<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Project;
use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

class ProjectController extends Controller
{

    private $project, $category;

    public function __construct(Project $project, Category $category)
    {
        $this->project = $project;
        $this->category = $category;
    }

    public function showAllProject(Request $request)
    {
        $listProject = $this->project->getAllProject()->paginate(10);
        if ($request->ajax()) {
            return view('admin.project_admin.ajax_project', compact(['listProject']));
        }
        return view('admin.project_admin.project', compact('listProject'));
    }

    public function deleteProject(Request $request)
    {
        $id = $request->get('id');
        $objProject = $this->project->getProjectById($id);
        $nameImage = Helpers::getNameImage($objProject->image_link);
        try {
            if ($this->project->deleteProject($id)) {
                Log::info('Delete project titled: ' . $objProject->name);
                Helpers::deleteImageFromCDN($nameImage);
                return Response::json(['msg' => 'DELETE SUCCESS']);
            } else {
                Log::info('The deleted project titled: ' . $objProject->name);
                return Response::json(['msg' => 'NO DELETE SUCCESS']);
            }
        } catch (\Exception $e) {
            Log::info($e);
            return Response::json(['msg' => 'NO DELETE SUCCESS']);
        }
    }

    public function getAddProject()
    {
        return view('admin.project_admin.add_project');
    }

    public function postAddProject(ProjectRequest $request)
    {
        $data = $request->all();
        $newNameImage = Helpers::createNewNameImage($data["imageProject"]->getClientOriginalName());
        $image_link = "https://storage.googleapis.com/madeindn/" . $newNameImage;
        $resultAddProject = $this->project->addProject($data['name'], $data['overview'], $data['author_name'], $data['author_email'], $data['author_phone'], $data['status'], $data['name_jp'], $data['overview_jp'], $data['category'], $image_link, $data['author_description'], $data['author_description_jp'], $data['position']);

        if ($resultAddProject) {
            Log::info('You just added project named: ' . $data['name']);
            Helpers::upLoadImageToCDN_N($data['imageProject'], $newNameImage);
            $request->session()->flash('msg', 'Success !');
            return redirect()->route('view.admin.project_admin.project');
        } else {
            Log::info('Add new coworking failed');
            $request->session()->flash('msg', 'Fail !');
            return redirect()->route('view.admin.project_admin.project');
        }
    }

    public function getEditProject($id)
    {
        $infoProject = $this->project->getProjectById($id);
        return view('admin.project_admin.edit_project', compact('infoProject'));
    }

    public function postEditProject($id, ProjectRequest $request)
    {
        $data = $request->all();
        $oldPrject = $this->project->getProjectById($id);

        if ($request->file('imageProject')) {
            $newNameImage = Helpers::createNewNameImage($data["imageProject"]->getClientOriginalName());
            $image_link = "https://storage.googleapis.com/madeindn/" . $newNameImage;
        } else {
            $image_link = $oldPrject->image_link;
        }

        $resultEditProject = $this->project->editProject($id, $data['name'], $data['overview'], $data['author_name'], $data['author_email'], $data['author_phone'], $data['status'], $data['name_jp'], $data['overview_jp'], $data['category'], $image_link, $data['author_description'], $data['author_description_jp'], $data['position']);

        if ($resultEditProject) {
            Log::info('You just edited project named: ' . $oldPrject->name);
            if ($request->file('imageProject')) {
                $nameImage = Helpers::getNameImage($oldPrject->image_link);
                Helpers::deleteImageFromCDN($nameImage);
                Helpers::upLoadImageToCDN_N($data['imageProject'], $newNameImage);
            }
            $request->session()->flash('msg', "Success");
            return redirect()->route('view.admin.project_admin.project');
        } else {
            Log::info('Edit project failed');
            $request->session()->flash('msg', 'Fail');
            return redirect()->route('view.admin.project_admin.project');
        }
    }

    public function ajaxChangeStatus(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');

        if($request->ajax()){
            $resultChange = $this->project->changeStatus($id,$status);
            if($resultChange){
               if($status == 1){

                   $data ="<a onclick=\"changeStatus('$id','2')\" href=\"javascript:void(0)\">
                            <img src=\"http://madeindn.abc:8081/admin/assets/img/icons/active.gif\" alt=\"\">
                        </a>";
               } else {
                   $data ="<a onclick=\"changeStatus('$id','1')\" href=\"javascript:void(0)\">
                            <img src=\"http://madeindn.abc:8081/admin/assets/img/icons/deactive.gif\" alt=\"\">
                        </a>";
               }
                Log::info('You just change status of Project Code: ' . $id);
                return Response($data);
            }
        }
    }
}
