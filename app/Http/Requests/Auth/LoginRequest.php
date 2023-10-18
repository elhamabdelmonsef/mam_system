<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'data.attributes.email' => ['required', 'email'],
            'data.attributes.password' => 'required',
        ];
    }
}
