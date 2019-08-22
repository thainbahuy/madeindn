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
            'name'              => 'required|max:255',
            'name_jp'           => 'required|max:255',
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
            'name.required' 			=> 'The Name Coworking field is required.',
            'name.max' 					=> 'The Name Coworking may not be greater than 255 characters.',
            'name.unique' 				=> 'The Name Coworking has already been taken.',

            'name_jp.required' 			=> 'The Name Coworking Japanese  field is required.',
            'name_jp.max' 				=> 'The Name Coworking Japanese may not be greater than 255 characters.',
            'name_jp.unique' 			=> 'The Name Coworking Japanese has already been taken.',

            'location.0.required'      	=> "The Location name field is required.",
            'location.1.required'      	=> "The Location address field is required.",
            'location.2.required'      	=> "The City field is required.",

            'location_jp.0.required'   	=> "The Location name Japanese field is required.",
            'location_jp.1.required'   	=> "The Location address Japanese field is required.",
            'location_jp.2.required'   	=> "The City Japanese field is required.",

            'overview.required' 		=> 'The Overview  field is required.',
            'overview_jp.required' 		=> 'The Overview Japanese  field is required.',

            'imageCoworking.required' 	=> 'Please choose a Image.',
        ];
    }
}
