<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name'                        => 'required|min:15|max:50',
            'address'                     => 'required|',
            'phone'                       => 'required|',
            'email'                       => 'required|email',
            'name_startup'                => 'required|min:10|max:255',
            'content'                     => 'required',
            'image_startup'               => 'required|',
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
            'email.required'        			=> __('message_submit_project.email.required'),
            'email.email'           			=> __('message_submit_project.email.email'),
            'name_startup.required' 			=> __('message_submit_project.name_startup.required'),
            'name_startup.min'      			=> __('message_submit_project.name_startup.min'),
            'name_startup.max'      			=> __('message_submit_project.name_startup.max'),
            'content.required'      			=> __('message_submit_project.content.required'),
            'image_startup.required'			=> __('message_submit_project.image_startup.required'),
            'files_startup.*.mimes'			    => __('message_submit_project.files_startup.mimes'),
        ];
    }
}
