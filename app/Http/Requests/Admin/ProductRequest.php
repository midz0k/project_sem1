<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'price' => 'required',
            'brand_id' => 'required',
            'file' => 'required',
            'category_id' => 'required',
            'weight' => 'required',
            'origin' => 'required',
            'description' => 'required',
            'color' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
            'name.unique' => 'Bạn ơi tên danh mục đã tồn tại!',
            'category_id.required' => 'Bạn ơi, Bạn chưa chọn mục này!',
            'weight.required' => 'Bạn ơi, Bạn chưa chọn mục này!',
            'origin.required' => 'Bạn ơi, Bạn chưa chọn mục này!',
            'price.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
            'brand_id.required' => 'Bạn ơi, Bạn chưa chọn mục này!',
            'file.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
            'color.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
            'description.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
        ];
    }
}
