<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProjectRequest extends FormRequest
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
        if ($request->project_id == '') {
            $rule_image = 'required';
        } else {
            $rule_image = '';
        }

        if ($request->position == '') {
            $rule_position = '';
        } else {
            $rule_position = 'numeric|min:1|max:500';
        }

        if ($request->project_id <> '') {
            if ($request->category == '') {
                $rule_category = '';
            } else {
                $rule_category = 'required';
            }
        } else {
            $rule_category = 'required';
        }


        return [
            'category' => $rule_category,
            'name' => 'required|max:255|unique:project,name,' . $request->id . ',id',
            'name_jp' => 'required|max:255|unique:project,jp_name,' . $request->id . ',id',
            'position' => $rule_position,

            'author_description' => 'required',
            'author_description_jp' => 'required',

            'author_name' => 'required',
            'author_email' => 'required',
            'author_phone' => 'required',


            'overview' => 'required',
            'overview_jp' => 'required',
            'imageProject' => $rule_image,
        ];
    }

    public function messages()
    {
        return [
            'category.required'               => 'The Category field is required.',
            'name.required'                   => 'The Name Project field is required.',
            'name.max'                        => 'The Name Project may not be greater than 255 characters.',
            'name.unique'                     => 'The Name Project has already been taken.',

            'name_jp.required'                => 'The Name Project JP  field is required.',
            'name_jp.max'                     => 'The Name Project JP may not be greater than 255 characters.',
            'name_jp.unique'                  => 'The Name Project JP has already been taken.',

            'author_description.required'     => 'The Author Description field is required.',
            'author_description_jp.required'  => 'The Author Description JP  field is required.',

            'author_name.required'            => 'The Author Name JP  field is required.',
            'author_email.required'           => 'The Author Email JP  field is required.',
            'author_phone.required'           => 'The Author Phone JP  field is required.',

            'overview.required'               => 'The Overview  field is required.',
            'overview_jp.required'            => 'The Overview JP  field is required.',

            'imageProject.required'           => 'Please choose a Image.',
        ];
    }
}
