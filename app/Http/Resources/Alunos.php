<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Alunos extends JsonResource
{
     
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'dataDeNascimento' => $this->dataDeNascimento,
            'genero' => $this->genero,
        ];
    }
}
