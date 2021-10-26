<?php

namespace App\Http\Controllers;

use App\Models\AlunosDeTurmas;
use App\Http\Resources\AlunosDeTurmas as AlunosDeTurmasResource;
use Illuminate\Http\Request;

class AlunosDeTurmasController extends Controller
{

    public function save(Request $request)
    {
        $alunosDeTurmas = new AlunosDeTurmas;
        $alunosDeTurmas->id_aluno = $request->input('id_aluno');
        $alunosDeTurmas->id_turma = $request->input('id_turma');

        $id_aluno = $alunosDeTurmas->id_aluno = $request->input('id_aluno');
        $id_turma = $alunosDeTurmas->id_turma = $request->input('id_turma');

        if (AlunosDeTurmas::where('id_aluno', $id_aluno)->where('id_turma', $id_turma)->count() > 0) {
            return response()->json(['error' => 'Aluno já cadastrado nessa turma.'], 400);
        } else {
            $alunosDeTurmas->save();
            return new AlunosDeTurmasResource($alunosDeTurmas);
        }
    }

    public function update(Request $request)
    {
        $alunosDeTurmas = AlunosDeTurmas::findOrFail($request->id);
        $alunosDeTurmas->id_aluno = $request->input('id_aluno');
        $alunosDeTurmas->id_turma = $request->input('id_turma');

        if ($alunosDeTurmas->save()) {
            return new AlunosDeTurmasResource($alunosDeTurmas);
        }
    }

    public function getAll()
    {
        $alunosDeTurmas = AlunosDeTurmas::paginate(15);
        return AlunosDeTurmasResource::collection($alunosDeTurmas);
    }

    public function getByID($id)
    {
        $alunosDeTurmas = AlunosDeTurmas::findOrFail($id);
        return new AlunosDeTurmasResource($alunosDeTurmas);
    }

    public function delete($id)
    {
        $alunosDeTurmas = AlunosDeTurmas::findOrFail($id);
        if ($alunosDeTurmas->delete()) {
            return new AlunosDeTurmasResource($alunosDeTurmas);
        }
    }

    public function search($id_aluno)
    {

        $alunosDeTurmas = AlunosDeTurmas::where('id_aluno', 'like', '%' . $id_aluno . '%')->get();

        return AlunosDeTurmasResource::collection($alunosDeTurmas);
    }
}
