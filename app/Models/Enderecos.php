<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model

{
    public $timestamps = false;
    protected $fillable = ['logradouro', 'numero', 'bairro', 'cidade', 'estado', 'id_escola'];

    public function escola()
    {
        return $this->hasOne(Escolas::class, 'id', 'id_escola');
    }
}
