<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Enderecos extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'id_escola' => $this->id_escola,
            'escola' => $this->escola,
        ];
    }
}
