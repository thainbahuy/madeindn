<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SubmitProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

        if($request->files_startup == null) {
            $rule_link  = "required";
        } else {
            $rule_link = "";
        }
        return [
            'name'                        => 'required|min:5|max:100',
            'address'                     => 'required|',
            'phone'                       => 'required|min:6|max:15',
            'email'                       => 'required|max:100|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'name_startup'                => 'required|min:10|max:255',
            'content'                     => 'required',
            'link_driver'                 => $rule_link,
//            'image_startup'               => 'required|',
            'files_startup.*'             => 'mimes:docx,doc,pdf',
        ];
    }

    public function messages() {
        return [
            'name.required'         			=> __('message_submit_project.name.required'),
            'name.min'              			=> __('message_submit_project.name.min'),
            'name.max'              			=> __('message_submit_project.name.max'),
            'address.required'      			=> __('message_submit_project.address.required'),
            'phone.required'        			=> __('message_submit_project.phone.required'),
            'phone.min'        			        => __('message_submit_project.phone.min'),
            'phone.max'        			        => __('message_submit_project.phone.max'),
            'email.required'        			=> __('message_submit_project.email.required'),
            'email.regex'           			=> __('message_submit_project.email.email'),
            'email.max'           			    => __('message_submit_project.email.max'),
            'name_startup.required' 			=> __('message_submit_project.name_startup.required'),
            'name_startup.min'      			=> __('message_submit_project.name_startup.min'),
            'name_startup.max'      			=> __('message_submit_project.name_startup.max'),
            'content.required'      			=> __('message_submit_project.content.required'),
            'link_driver.required'      	    => __('message_submit_project.link_driver.required'),
//            'image_startup.required'			=> __('message_submit_project.image_startup.required'),
            'files_startup.*.mimes'			    => __('message_submit_project.files_startup.mimes'),
        ];
    }
}
