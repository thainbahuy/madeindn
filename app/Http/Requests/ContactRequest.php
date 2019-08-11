<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'                        => 'required|max:40',
            'mobile'                      => 'required|max:15',
            'email'                       => 'required|email|max:50',
            'title'                       => 'required|min:6|max:200',
            'content'                     => 'required|min:20',
        ];
    }

    public function messages() {
        return [
            'name.required'         => __('message_contact.name.required'),
            'name.max'              => __('message_contact.name.max'),
            'title.min'             => __('message_contact.title.min'),
            'title.required'        => __('message_contact.title.required'),
            'mobile.required'       => __('message_contact.mobile.required'),
            'email.required'        => __('message_contact.email.required'),
            'email.max'             => __('message_contact.email.max'),
            'email.email'           => __('message_contact.email.email'),
            'content.required'      => __('message_contact.content.required'),
            'title.max'             => __('message_contact.title.max'),
            'content.min'           => __('message_contact.content.min'),
            'mobile.max'            => __('message_contact.mobile.max'),
        ];
    }
}
