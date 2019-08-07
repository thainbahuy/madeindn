<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    private $contactProject;

    public function __construct(Customer $contactProject)
    {
        $this->contactProject = $contactProject;
    }

    /**Displays customer information entered in the project page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContactProject(Request $request)
    {
        $listInfoContactProject = $this->contactProject->showInfoProjectDetails()->paginate(10);
        if ($request->ajax()) {
            return view('admin.contact.ajax_info_contact_project', compact(['listInfoContactProject']));
        }
        return view('admin.contact.info_contact_project', compact('listInfoContactProject'));
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
}