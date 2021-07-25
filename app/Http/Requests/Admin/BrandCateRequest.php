<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandCateRequest extends FormRequest
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
            'brand_id' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'brand_id.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
            'category_id.required' => 'Bạn ơi, Bạn chưa nhập mục này!',
        ];
    }
}
