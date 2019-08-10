<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AboutRequest extends FormRequest
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
        if ($request->about_id == '') {
            $rule_image = 'required';
        } else {
            $rule_image = '';
        }
        if ($request->get('position') == null) {
            return [
                'name' => 'required|max:100|min:6',
                'jp_name' => 'required|max:100|min:6',
                'description' => 'required|min:6',
                'jp_description' => 'required|min:6',
                'imageAbout' => $rule_image,
            ];
        } else {
            return [
                'name' => 'required|max:100|min:6',
                'jp_name' => 'required|max:100|min:6',
                'description' => 'required|min:6',
                'jp_description' => 'required|min:6',
                'position' => 'unique:more,position,' . $request->id . ',id',
                'imageAbout' => $rule_image,
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'The Name field is required.',
            'name.min' => 'The Name must be at least 6 characters.',
            'name.max' => 'The Name may not be greater than 100 characters',
            'jp_name.required' => 'The Name JP field is required.',
            'jp_name.min' => 'The Name JP must be at least 6 characters.',
            'jp_name.max' => 'The Name JP may not be greater than 100 characters',
            'description.required' => 'The Description field is required.',
            'description.min' => 'The Description must be at least 6 characters.',
            'jp_description.required' => 'The Description JP field is required.',
            'jp_description.min' => 'The Description JP must be at least 6 characters.',
            'position.unique' => 'The position has already been taken.',
            'image_link.required' => 'Please choose a Image cover.',
        ];
    }
}