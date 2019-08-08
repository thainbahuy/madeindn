<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
//        if($request->coworking_id == ''){
//            $rule_image = 'required';
//        } else {
//            $rule_image = '';
//        }

        if($request->position == ''){
            $rule_position = '';
        } else {
            $rule_position = 'unique:category,position,' . $request->id . ',id';
        }

        return [
            'name'              => 'unique:category,name,' . $request->id . ',id',
            'name_jp'           => 'unique:category,jp_name,' . $request->id . ',id',
            'position'          => $rule_position,
        ];
    }

    public function messages()
    {
        return [
            'name.unique'               => __('message_category.name.unique'),

            'name_jp.unique'            => __('message_category.name_jp.unique'),

            'position.unique'           => __('message_category.position.unique'),
        ];
    }
}
