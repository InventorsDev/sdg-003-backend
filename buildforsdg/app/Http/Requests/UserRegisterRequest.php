<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name Is Required',
            'last_name.required' => 'Last name Is Required',
            'email.required' => 'Email Is Required',
            'email.unique:users' => 'Email Is taken',
            'email.email' => 'Enter a valid Email',
            'password.required' => 'Password Is Required',
        ];
    }
}
