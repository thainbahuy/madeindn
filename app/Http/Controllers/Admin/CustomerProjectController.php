<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ProjectSubmit;
use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;


class CustomerProjectController extends Controller
{
    private $projectSubmit;

    public function __construct(ProjectSubmit $projectSubmit)
    {
        $this->projectSubmit = $projectSubmit;
    }

    /**Dislay Show all customer submitted projects
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCustomerProject(Request $request)
    {
        $listCustomerProject = $this->projectSubmit->showAllProject()->paginate(10);
        if ($request->ajax()) {
            return view('admin.project.ajax_project_customer', compact(['listCustomerProject']));
        }
        return view('admin.project.project_customer', compact('listCustomerProject'));
    }

    /**Display info about project by ID
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCustomerProjectById($id, Request $request)
    {
        $viewCustomerProject = $this->projectSubmit->showDetailProjectById($id);
        return view('admin.project.detail_project_submit', compact('viewCustomerProject'));
    }

    /** Delete Project by id
     * @param Request $request
     * @return mixed
     */
    public function deleteProjectSubmit(Request $request)
    {
        $id = $request->get('id');
        if ($request->ajax()) {
            $files = Helpers::convertToJson($this->projectSubmit->showDetailProjectById($id)->content_link, true);
            if ($files != null) {
                foreach ($files as $key => $value) {
                    File::delete(Helpers::getFileFromStorage('project_submit/link_project/' . $value));
                }
            }
            $deleteProjectSubmit = $this->projectSubmit->deleteProjectSubmit($id);
            if ($deleteProjectSubmit) {
                return \Response::json(['msg' => 'DELETE SUCCESS']);
            } else {
                return \Response::json(['msg' => 'NO DELETE SUCCESS']);
            }
        }
    }
}
