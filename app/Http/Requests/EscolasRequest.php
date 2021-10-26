<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscolasRequest extends FormRequest
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
            'nomeEscola' => 'required|max:255|unique:escolas',
            'logradouro' => 'required|max:255',
            'numero' => 'required|max:255',
            'bairro' => 'required|max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'nomeEscola.unique' => 'A escola já está cadastrada!',
            'nomeEscola.required' => 'É necessário definir uma escola.',
            'logradouro.required' => 'É necessário definir um endereço.',
            'numero.required' => 'É necessário definir um número.',
            'bairro.required' => 'É necessário definir um bairro',
            'cidade.required' => 'É necessário definir uma cidade.',
            'estado.required' => 'É necessário definir uma estado.',
        ];
    }
}
