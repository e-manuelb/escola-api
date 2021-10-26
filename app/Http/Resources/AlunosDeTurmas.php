<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlunosDeTurmas extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_aluno' => $this->id_aluno,
            'id_turma' => $this->id_turma,
            'aluno' => $this->aluno,
            'turma' => $this->turma,
        ];
    }
}
