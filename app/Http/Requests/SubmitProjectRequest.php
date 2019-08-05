<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitProjectRequest extends FormRequest
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
            'name'                        => 'required|min:15',
            'address'                     => 'required|',
            'phone'                       => 'required|numeric',
            'address'                     => 'required|',
            'phone'                       => 'required|',
            'email'                       => 'required|email',
            'name_startup'                => 'required|min:20',
            'content'                     => 'required',
            'image_startup'               => 'required|',
        ];
    }

    public function messages() {
        return [
            'name.required'         => 'Vui lòng nhập họ tên của bạn',
            'name.min'              => 'Tên của bạn tối thiểu 10 ký tự',
            'address.required'      => 'Vui lòng nhập họ và tên của bạn',
            'phone.required'        => 'Vui lòng nhập số điện thoại',
            'email.required'        => 'Vui lòng nhập email của bạn',
            'email.email'           => 'Vui lòng nhập đúng định dạng email',
            'name_startup.required' => 'Vui lòng nhập tên Start Up',
            'name_startup.min'      => 'Tên start up tối thiểu 10 ký tự',
            'content.required'      => 'Vui lòng nhập nội dung',
            'image_startup.required'=> 'Vui lòng Upload 1 tấm ảnh về startup',
        ];
    }
}
