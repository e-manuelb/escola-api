<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolas extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nomeEscola'];

    public function endereco()
    {
        return $this->hasOne(Enderecos::class, 'id_escola');
    }

    public function turmas()
    {
        return $this->hasMany(Turmas::class, 'id_escola');
    }
}
