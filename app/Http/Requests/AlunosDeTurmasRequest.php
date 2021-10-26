<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunosDeTurmasRequest extends FormRequest
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
            'id_aluno' => 'required',
            'id_turma' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_aluno.required' => 'O aluno precisa ser preenchido!',
            'id_turma.required' => 'A turma precisa ser preenchida',
        ];
    }
}
