<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ProjectSubmit;
use Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Yajra\DataTables\DataTables;


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
        $listCustomerProject = $this->projectSubmit->showAllProject()->get();
        if ($request->ajax()) {
            return DataTables::of($listCustomerProject)
                ->addColumn('feature', function ($listCustomerProject) {
                    $data = '<a onclick="showModalProject(' . "'$listCustomerProject->id'" . ')" href="javascript:">
                            <img style="width: 25px; height: 25px;" src="/admin/assets/img/icons/61848.png" alt="">
                        </a>' .
                        ' ||&nbsp; <a href="' . route('view.admin.project.detail_project_submit', $listCustomerProject->id) . '">
                            <img style="width: 25px; height: 25px;" src="/admin/assets/img/icons/eye_1-512.png" alt="">
                        </a>';
                    return $data;
                })
                ->rawColumns(['feature'])
                ->make(true);
        }
        return view('admin.project.project_customer')->with('title','List Customer Project');
    }

    /**Display info about project by ID
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCustomerProjectById($id, Request $request)
    {
        $viewCustomerProject = $this->projectSubmit->showDetailProjectById($id);
        return view('admin.project.detail_project_submit', compact('viewCustomerProject'))->with('title','Customer Project');
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
                    File::delete(Helpers::getFilePathFromStorage('project_submit/link_project/' . $value));
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

    /** Download files
     * @param $name
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadFile($name)
    {
        $file = Helpers::getFilePathFromStorage('project_submit/link_project/' . $name);
        $name = basename($file);
        return response()->download($file, $name);
    }

}
