<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|unique:brands',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
            'name.unique' => 'Bạn ơi tên danh mục đã tồn tại!',
        ];
    }
}
