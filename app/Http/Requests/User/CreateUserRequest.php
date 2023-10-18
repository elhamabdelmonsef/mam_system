<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'data.attributes.name' => ['required', 'string', 'max:50'],
            'data.attributes.password' => ['required', 'string', 'min:6', 'max:50', 'confirmed'],
            'data.attributes.email' => ['required', 'email', Rule::unique('users', 'email')],
            ];
    }
}
