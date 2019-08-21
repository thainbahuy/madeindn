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
                'position' => 'numeric|min:1|max:500',
                'imageAbout' => $rule_image,
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'The Title field is required.',
            'name.min' => 'The Title must be at least 6 characters.',
            'name.max' => 'The Title may not be greater than 100 characters',
            'jp_name.required' => 'The Title Japan field is required.',
            'jp_name.min' => 'The Title Japan must be at least 6 characters.',
            'jp_name.max' => 'The Title Japan may not be greater than 100 characters',
            'description.required' => 'The Description field is required.',
            'description.min' => 'The Description must be at least 6 characters.',
            'jp_description.required' => 'The Description Japan field is required.',
            'jp_description.min' => 'The Description Japan must be at least 6 characters.',
            'imageAbout.required' => 'Please choose a Image.',
        ];
    }
}