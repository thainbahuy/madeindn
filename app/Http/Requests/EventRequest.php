<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EventRequest extends FormRequest
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
        if($request->get('image_display') == ''){
            $ruleImage = 'required';
        } else{
            $ruleImage = '';
        }



        if ($request->get('position') == null){

            return [
                'name' => 'required|max:100|min:6',
                'jp_name' => 'required|max:100|min:6',

                'sort_description' => 'required|max:500|min:6',
                'jp_sort_description' => 'required|max:500|min:6',

                'overview' => 'required|max:3500|min:6',
                'jp_overview' => 'required|max:3500|min:6',

                'location.*' => 'required',
                'jp_location.*' => 'required',
                'date_time' => 'required',
                'begin_time' => 'required',
                'end_time' => 'required',
                'image_link' => $ruleImage,
            ];


        }else{

            return [
                'name' => 'required|max:100|min:6',
                'jp_name' => 'required|max:100|min:6',

                'sort_description' => 'required|max:500|min:6',
                'jp_sort_description' => 'required|max:500|min:6',

                'overview' => 'required|max:3500|min:6',
                'jp_overview' => 'required|max:3500|min:6',

                'location.*' => 'required',
                'jp_location.*' => 'required',
                'date_time' => 'required',
                'begin_time' => 'required',
                'end_time' => 'required',
                'image_link' => $ruleImage,
                'position' => 'unique:event,position,' . $request->id . ',id',
            ];

        }

    }
    public function messages() {
        return [
            'name.required'            => 'The Name field is required.',
            'name.min'                 => 'The Name must be at least 6 characters.',
            'name.max'                 => 'The Name may not be greater than 100 characters',
            'jp_name.required'         => 'The Name JP field is required.',
            'jp_name.min'              => 'The Name JP must be at least 6 characters.',
            'jp_name.max'              => 'The Name JP may not be greater than 100 characters',

            'sort_description.required'            => 'The Sort Description field is required.',
            'sort_description.min'                 => 'The Sort Description must be at least 6 characters.',
            'sort_description.max'                 => 'The Sort Description may not be greater than 500 characters',
            'jp_sort_description.required'         => 'The Sort Description JP field is required.',
            'jp_sort_description.min'              => 'The Sort Description JP must be at least 6 characters.',
            'jp_sort_description.max'              => 'The Sort Description JP may not be greater than 500 characters',

            'overview.required'            => 'The Overview field is required.',
            'overview.min'                 => 'The Overview must be at least 6 characters.',
            'overview.max'                 => 'The Overview may not be greater than 3500 characters',
            'jp_overview.required'         => 'The Overview JP field is required.',
            'jp_overview.min'              => 'The Overview JP must be at least 6 characters.',
            'jp_overview.max'              => 'The Overview JP may not be greater than 3500 characters',

            'location.0.required'            => 'The Address field is required.',
            'location.1.required'            => 'The Street field is required.',
            'location.2.required'            => 'The City field is required.',

            'jp_location.0.required'            => 'The Address JP field is required.',
            'jp_location.1.required'            => 'The Street JP field is required.',
            'jp_location.2.required'            => 'The City JP field is required.',

            'date_time.required'            => 'The Date field is required.',
            'begin_time.required'            => 'The Begin time field is required.',
            'end_time.required'            => 'The End time field is required.',
            'image_link.required'            => 'Please choose a Image cover.',

            'position.unique'            => 'The position has already been taken.',
        ];
    }
}
