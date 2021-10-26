<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunosDeTurmas extends Model
{
    use HasFactory;


    public $timestamps = false;
    protected $fillable = ['id_aluno', 'id_turma'];

    public function aluno()
    {
        return $this->hasMany(Alunos::class, 'id', 'id_aluno');
    }

    public function turma()
    {
        return $this->hasMany(Turmas::class, 'id', 'id_turma');
    }

}
