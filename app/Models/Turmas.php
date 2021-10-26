<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turmas extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['ano', 'nivelDeEnsino', 'serie', 'turno', 'id_escola'];

    public function alunosDeTurmas()
    {
        return $this->hasMany(AlunosDeTurmas::class, 'id_turma');
    }
}
