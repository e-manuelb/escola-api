<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Turmas extends JsonResource
{

    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'ano' => $this->ano,
            'nivelDeEnsino' => $this->nivelDeEnsino,
            'serie' => $this->serie,
            'turno' => $this->turno,
            'id_escola' => $this->id_escola,
            'matriculas'=>$this->alunosDeTurmas
        ];
    }
}
