<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class PartnerBackgroundRequest extends FormRequest
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
        if ($request->get('position') == null){

            return [
                'name' => 'required|max:100|min:6',
                'image_link' => 'required',
            ];


        }else{

            return [
                'name' => 'required|max:100|min:6',
                'image_link' => 'required',
                'position' => 'numeric|min:1|max:500',
            ];

        }
    }

    public function messages() {
        return [
            'name.required'            => 'The Name field is required.',
            'name.min'                 => 'The Name must be at least 6 characters.',
            'name.max'                 => 'The Name may not be greater than 100 characters',
            'image_link.required'               => 'Please choose a Image',
        ];
    }
}
