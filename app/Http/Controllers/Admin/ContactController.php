<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Contact;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $listInfoContactProject = $this->contactProject->showInfoProjectDetails()->paginate(10);
        if ($request->ajax()) {
            return view('admin.contact.ajax_info_contact_project', compact(['listInfoContactProject']));
        }
        return view('admin.contact.info_contact_project', compact('listInfoContactProject'))->with('title','List contact');
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
        $listInfoContact = $this->contactCustomer->showInfoContact()->paginate(10);
        if ($request->ajax()) {
            return view('admin.contact.ajax_info_contact_customer', compact(['listInfoContact']));
        }
        return view('admin.contact.info_contact_customer', compact('listInfoContact'))->with('title','Contact customer');
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
