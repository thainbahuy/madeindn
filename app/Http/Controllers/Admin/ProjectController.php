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
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{

    private $project, $category;

    public function __construct(Project $project, Category $category)
    {
        $this->project = $project;
        $this->category = $category;
    }

    /**
     * Display All Project by Admin submit
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllProject(Request $request)
    {
        $listAllProject = $this->project->getAllProject();
        if($request->ajax()){
            return DataTables::of($listAllProject)
                ->editColumn('image_link', function ($listAllProject) {
                    $image = Helpers::$URL_THUMBNAIL.$listAllProject->image_link;
                    return '<img style="100px";height="100px" class="img img-thumbnail" src="' . $image . '" alt="" class="img-circle img-avatar-list">';
                })
                ->editColumn('cname', function ($listAllProject) {
                    if($listAllProject->category_id == null) {
                        return "Category was deleted";
                    } else {
                        return $listAllProject->cname;
                    }
                })
                ->editColumn('status', function ($listAllProject) {
                    if ($listAllProject->status == 1) {
                        $data = '<a onclick="changeStatus(' . "'$listAllProject->id'" . ',\'2\')" href="javascript:void(0)">
                            <img src="/admin/assets/img/icons/active.gif" alt="">
                            </a>';
                    } else {
                        $data = '<a onclick="changeStatus(' . "'$listAllProject->id'" . ',\'1\')" href="javascript:void(0)">
                            <img src="/admin/assets/img/icons/deactive.gif" alt="">
                            </a>';
                    }
                    return $data."<span style='display: none;'>".$listAllProject->status."</span>";
                })
                ->addColumn('feature', function ($listAllProject) {
                    $data = '<a onclick="showModalContact(' . "'$listAllProject->id'" . ')" href="javascript:">
                            <img style="width: 25px; height: 25px;" src="/admin/assets/img/icons/61848.png" alt="">
                        </a>' .
                        ' ||&nbsp; <a href="' . route('view.admin.project_admin.edit_project', $listAllProject->id) . '">
                            <img style="width: 25px; height: 25px;" src="/admin/assets/img/icons/eye_1-512.png" alt="">
                        </a>';
                    return $data;
                })
                ->rawColumns(['image_link', 'status', 'feature', 'cname'])
                ->make(true);
        }
        return view('admin.project_admin.project')->with('title','List Project');;
    }

    /** Delete Project by Id
     * @param Request $request
     * @return mixed
     */
    public function deleteProject(Request $request)
    {
        $id = $request->get('id');
        $objProject = $this->project->getProjectById($id);
        $nameImage = $objProject->image_link;
        $imageAuthor = Helpers::getNameImage($objProject->author_avatar);
        try {
            if ($this->project->deleteProject($id)) {
                Log::info('Delete project titled: ' . $objProject->name);
                Helpers::deleteImageFromCDN(Helpers::$THUMBNAIL.$nameImage);
                Helpers::deleteImageFromCDN(Helpers::$DETAIL.$nameImage);
                Helpers::deleteImageFromCDN($imageAuthor);
                return \Response::json(['msg' => 'DELETE SUCCESS']);
            } else {
                Log::info('The deleted project titled: ' . $objProject->name);
                return \Response::json(['msg' => 'DELETE SUCCESS']);
            }
        } catch (\Exception $e) {
            Log::info($e);
            return \Response::json(['msg' => 'NO DELETE SUCCESS']);
        }
    }

    /**Display Form add new Project by Admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddProject()
    {
        return view('admin.project_admin.add_project')->with('title','Add New Project');;
    }

    /** Insert new Submit by ADmin into Database
     * @param ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddProject(ProjectRequest $request)
    {
        $data = $request->all();
        $newNameImage = Helpers::createNewNameImage($data["imageProject"]->getClientOriginalName());
        $this->uploadImageToCDN($newNameImage,$data["imageProject"]);
        if ($request->file('author_image')) {
            $newNameImageAuthor = Helpers::createNewNameImage($data["author_image"]->getClientOriginalName());
            $image_link_author =  Helpers::upLoadImageToCDN_N($data['author_image'], $newNameImageAuthor);
        } else {
            $image_link_author = null;
        }

        $resultAddProject = $this->project->addProject($data['name'], $data['overview'], $data['author_name'], $data['author_email'], $data['author_phone'], $data['status'], $data['name_jp'], $data['overview_jp'], $data['category'], $newNameImage, $data['author_description'], $data['author_description_jp'], $data['position'], $image_link_author);

        if ($resultAddProject) {
            Log::info('You just added project named: ' . $data['name']);
            $request->session()->flash('msg', 'Success !');
            return redirect()->route('view.admin.project_admin.project');
        } else {
            Log::info('Add new coworking failed');
            $request->session()->flash('msg', 'Fail !');
            return redirect()->route('view.admin.project_admin.project');
        }
    }

    /** Display form edit pơroject by Id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditProject($id)
    {
        $infoProject = $this->project->getProjectById($id);
        return view('admin.project_admin.edit_project', compact('infoProject'))->with('title','Edit Project');;
    }

    /** Update new information into Database
     * @param $id
     * @param ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditProject($id, ProjectRequest $request)
    {
        $data = $request->all();
        $oldPrject = $this->project->getProjectById($id);

        if ($request->file('imageProject')) {
            $newNameImage = Helpers::createNewNameImage($data["imageProject"]->getClientOriginalName());
            $image_link = $newNameImage;
            $this->uploadImageToCDN($newNameImage,$data["imageProject"]);
        } else {
            $image_link = $oldPrject->image_link;
        }

        if ($request->file('author_image')) {
            $newNameImageAuthor = Helpers::createNewNameImage($data["author_image"]->getClientOriginalName());
            $image_link_author = Helpers::upLoadImageToCDN_N($data['author_image'], $newNameImageAuthor);
        } else {
            $image_link_author = $oldPrject->author_avatar;
        }

        $resultEditProject = $this->project->editProject($id, $data['name'], $data['overview'], $data['author_name'], $data['author_email'], $data['author_phone'], $data['status'], $data['name_jp'], $data['overview_jp'], $data['category'], $image_link, $data['author_description'], $data['author_description_jp'], $data['position'], $image_link_author);

        if ($resultEditProject) {
            Log::info('You just edited project named: ' . $oldPrject->name);
            if ($request->file('imageProject')) {
                $nameImage = $oldPrject->image_link;
                Helpers::deleteImageFromCDN(Helpers::$THUMBNAIL.$nameImage);
                Helpers::deleteImageFromCDN(Helpers::$DETAIL.$nameImage);
            }

            if ($request->file('author_image')) {
                $oldImageAuthor = Helpers::getNameImage($oldPrject->author_avatar);
                Helpers::deleteImageFromCDN($oldImageAuthor);
            }
            $request->session()->flash('msg', "Success");
            return redirect()->route('view.admin.project_admin.project');
        } else {
            Log::info('Edit project failed');
            $request->session()->flash('msg', 'Fail');
            return redirect()->route('view.admin.project_admin.project');
        }
    }

    /** Change status HIDE SHOW in Project
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function ajaxChangeStatus(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');

        if ($request->ajax()) {
            $resultChange = $this->project->changeStatus($id, $status);
            if ($resultChange) {
                if ($status == 1) {
                    $data = "<a onclick=\"changeStatus('$id','2')\" href=\"javascript:void(0)\">
                            <img src=\"/admin/assets/img/icons/active.gif\" alt=\"\">
                        </a>";
                } else {
                    $data = "<a onclick=\"changeStatus('$id','1')\" href=\"javascript:void(0)\">
                            <img src=\"/admin/assets/img/icons/deactive.gif\" alt=\"\">
                        </a>";
                }
                Log::info('You just change status of Project Code: ' . $id);
                return Response($data);
            }
        }
    }

    private function uploadImageToCDN($name,$imageFile){
        //for thumbnail
        $thubnail = Helpers::resizeImage($imageFile,1);
        Helpers::upLoadImageToCDNDetail_H($thubnail->content(),$name,1);

        //for detail
        $detail = Helpers::resizeImage($imageFile,2);
        Helpers::upLoadImageToCDNDetail_H($detail->content(),$name,2);

    }
}
