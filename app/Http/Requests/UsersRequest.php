<?php

namespace App\Http\Requests;

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
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O name precisa ser preenchido!',
            'email.required' => 'O email precisa ser preenchido!',
            'password.required' => 'A senha precisa ser preenchida!',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres!'
        ];
    }
}
