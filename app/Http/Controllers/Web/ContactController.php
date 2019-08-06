<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Web\Contact;
use Session;

class ContactController extends Controller
{
    private $contact;

    function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Show contact page
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showContact()
    {
        return view('web.contact.contact');
    }

    /**
     * Insert contact_form into table 'Contact' in Database.
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertContact(ContactRequest $request)
    {
        $request = $request->all();
        if($this->contact->addContact(trim($request['name']),trim($request['email']),trim($request['mobile']),trim($request['title']),trim($request['content'])) == true )
        {
            Session::flash('msg', 'success');
            return redirect()->back();
        }
        else
        {
            Session::flash('msg', 'danger');
            return redirect()->back();
        }
    }
}