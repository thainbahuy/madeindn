<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Contact;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    private $contactProject, $contactCustomer;

    public function __construct(Customer $contactProject, Contact $contactCustomer)
    {
        $this->contactProject = $contactProject;
        $this->contactCustomer = $contactCustomer;
    }

    /**Displays customer information entered in the project page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContactProject(Request $request)
    {
        $listInfoContactProject = $this->contactProject->showInfoProjectDetails()->get();
        if ($request->ajax()) {
            return DataTables::of($listInfoContactProject)
                ->editColumn('content_customer',function($listInfoContactProject){
                    return '<button class="btn btn-danger btn-xs" id="show_info" value="'.$listInfoContactProject->content_customer.'">SHOW CONTENT</button>';
                })
                ->editColumn('project_id',function($listInfoContactProject){
                    if($listInfoContactProject->product_id <> null){
                        $data = '<a href="'.route("web.project.project_detail",['name'=>str_slug($listInfoContactProject->project->name),'id'=>$listInfoContactProject->project->id]).'">'.$listInfoContactProject->id.'</a>';
                    } else {
                        $data =  'Project was delete';
                    }
                    return $data;
                })
                ->addColumn('feature', function ($listInfoContactProject) {
                    $data = '<a onclick="showModalContact(' . "'$listInfoContactProject->id'" . ')" href="javascript:">
                            <img style="width: 25px; height: 25px;" src="/admin/assets/img/icons/61848.png" alt="">
                        </a>';
                    return $data;
                })
                ->rawColumns(['feature','content_customer','project_id'])
                ->make(true);
        }
        return view('admin.contact.info_contact_project')->with('title','List contact');
    }

    /**Delete customer information entered in the project page into the database
     * @param Request $request
     * @return mixed
     */
    public function deleteInfoCustomerProject(Request $request)
    {
        $id = $request->get('id');
        if ($request->ajax()) {
            if ($this->contactProject->deleteInfoProjectCustomer($id)) {
                return \Response::json(['msg' => 'DELETE SUCCESS']);
            } else {
                return \Response::json(['msg' => 'NO DELETE SUCCESS']);
            }
        }
    }

    /**Displays customer information entered in the contact page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContactCustomer(Request $request)
    {
        $listInfoContact = $this->contactCustomer->showInfoContact()->get();
        if ($request->ajax()) {
            return DataTables::of($listInfoContact)
                ->editColumn('content',function($listInfoContact){
                    return '<button class="btn btn-danger btn-xs" id="show_info" value="'.$listInfoContact->content.'">SHOW CONTENT</button>';
                })
                ->addColumn('feature', function ($listInfoContact) {
                    $data = '<a onclick="showModalContact(' . "'$listInfoContact->id'" . ')" href="javascript:">
                            <img style="width: 25px; height: 25px;" src="/admin/assets/img/icons/61848.png" alt="">
                        </a>';
                    return $data;
                })
                ->rawColumns(['feature','content'])
                ->make(true);
        }
        return view('admin.contact.info_contact_customer')->with('title','Contact customer');
    }

    /**Delete customer information entered in the contact page into the database
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deleteInfoCustomer(Request $request)
    {
        $id = $request->get('id');
        if ($request->ajax()) {
            if ($this->contactCustomer->deleteInfoCustomer($id)) {
                return \Response::json(['msg' => 'DELETE SUCCESS']);
            } else {
                return \Response::json(['msg' => 'NO DELETE SUCCESS']);
            }
        }
    }
}
