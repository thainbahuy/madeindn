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
            'name' => 'required|max:255',
            'name_jp' => 'required|max:255',
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
            'category.required' => __('message_project.category.required'),
            'name.required' => __('message_project.name.required'),
            'name.max' => __('message_project.name.max'),
            'name.unique' => __('message_project.name.unique'),

            'name_jp.required' => __('message_project.name_jp.required'),
            'name_jp.max' => __('message_project.name_jp.max'),
            'name_jp.unique' => __('message_project.name_jp.unique'),

            'author_description.required' => __('message_project.author_description.required'),
            'author_description_jp.required' => __('message_project.author_description_jp.required'),

            'author_name.required' => __('message_project.author_name.required'),
            'author_email.required' => __('message_project.author_email.required'),
            'author_phone.required' => __('message_project.author_phone.required'),

            'position.unique' => __('message_project.position.unique'),


            'overview.required' => __('message_project.overview.required'),
            'overview_jp.required' => __('message_project.overview_jp.required'),

            'imageProject.required' => __('message_project.imageProject.required'),
        ];
    }
}
