<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;

    public function aluno()
    {
        return $this->hasMany(AlunosDeTurmas::class, 'id_aluno');
    }
}
