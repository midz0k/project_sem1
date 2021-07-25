<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'file' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'err',
            'email.unique' => 'err',
            'email.required' => 'err',
            'phone.required' => 'err',
            'password.required' => 'err',
            'file.required' => 'err',
        ];
    }
}
