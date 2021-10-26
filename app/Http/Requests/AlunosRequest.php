<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'telefone' => 'required|max:20',
            'email' => 'required|max:255|unique:alunos',
            'dataDeNascimento' => 'required|max:10',
            'genero' => 'required|max:20'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório!',
            'telefone.required' => 'O telefone é obrigatório!',
            'email.required' => 'O email é obrigatório!',
            'dataDeNascimento.required' => 'O A data de nascimento é obrigatória!',
            'genero.required' => 'O gênero é obrigatório!',
            'email.required' => 'O email é obrigatório!',
            'email.unique' => 'O email já está sendo utilizado!',
        ];
    }
}
