<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Escolas extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nomeEscola' => $this->nomeEscola,
            'endereco' => $this->endereco,
            'turmas' => $this->turmas,
            'alunos'=> $this->alunos
        ];
    }
}
