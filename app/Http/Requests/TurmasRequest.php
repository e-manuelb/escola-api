<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmasRequest extends FormRequest
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
            'ano' => 'required|max:4',
            'nivelDeEnsino' => 'required',
            'serie' => 'required',
            'turno' => 'required',
            'id_escola' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ano.required' => 'O ano precisa ser preenchido!',
            'nivelDeEnsino.required' => 'O nível de ensino precisa ser preenchido!',
            'serie.required' => 'A série precisa ser preenchida!',
            'turno.required' => 'O turno precisa ser preenchido!',
            'id_escola.required' => 'A escola precisa ser preenchida!'
        ];
    }
}
