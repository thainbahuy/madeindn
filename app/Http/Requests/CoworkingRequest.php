<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CoworkingRequest extends FormRequest
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
        if($request->coworking_id == ''){
            $rule_image = 'required';
        } else {
            $rule_image = '';
        }

        if($request->position == ''){
            $rule_position = '';
        } else {
            $rule_position = 'numeric|min:1|max:500';
        }

        return [
            'name'              => 'required|max:255|unique:co_working,name,' . $request->id . ',id',
            'name_jp'           => 'required|max:255|unique:co_working,jp_name,' . $request->id . ',id',
            'position'          => $rule_position,
            'location.*'        => 'required',
            'location_jp.*'     => 'required',
            'overview'          => 'required',
            'overview_jp'       => 'required',
            'imageCoworking'    => $rule_image,
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => __('message_coworking.name.required'),
            'name.max'                  => __('message_coworking.name.max'),
            'name.unique'               => __('message_coworking.name.unique'),

            'name_jp.required'          => __('message_coworking.name_jp.required'),
            'name_jp.max'               => __('message_coworking.name_jp.max'),
            'name_jp.unique'            => __('message_coworking.name_jp.unique'),

            'position.unique'           => __('message_coworking.position.unique'),

            'location.0.required'       => __('message_coworking.location.0.required'),
            'location.1.required'       => __('message_coworking.location.1.required'),
            'location.2.required'       => __('message_coworking.location.2.required'),

            'location_jp.0.required'    => __('message_coworking.location_jp.0.required'),
            'location_jp.1.required'    => __('message_coworking.location_jp.1.required'),
            'location_jp.2.required'    => __('message_coworking.location_jp.2.required'),

            'overview.required'         => __('message_coworking.overview.required'),
            'overview_jp.required'      => __('message_coworking.overview_jp.required'),

            'imageCoworking.required'   => __('message_coworking.imageCoworking.required'),
        ];
    }
}
