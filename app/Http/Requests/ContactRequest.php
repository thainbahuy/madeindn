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
            'name'                        => 'required',
            'mobile'                      => 'required|numeric',
            'email'                       => 'required|email',
            'title'                       => 'required|',
            'content'                     => 'required|',
        ];
    }

    public function messages() {
        return [
            'name.required'         => 'Vui lòng nhập họ tên của bạn',
            'title.required'        => 'Vui lòng nhập tiêu đề của bài viết',
            'mobile.required'       => 'Vui lòng nhập số điện thoại của bạn',
            'email.required'        => 'Vui lòng nhập email của bạn',
            'email.email'           => 'Vui lòng nhập đúng định dạng email',
            'content.required'      => 'Vui lòng nhập nội dung bài viết',
        ];
    }
}
