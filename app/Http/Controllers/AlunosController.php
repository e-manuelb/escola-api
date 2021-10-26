<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunosRequest;
use App\Models\Alunos;
use App\Http\Resources\Alunos as AlunosResource;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function save(AlunosRequest $request)
    {
        $alunos = new Alunos;
        $alunos->nome = $request->input('nome');
        $alunos->telefone = $request->input('telefone');
        $alunos->email = $request->input('email');
        $alunos->dataDeNascimento = $request->input('dataDeNascimento');
        $alunos->genero = $request->input('genero');

        if ($alunos->save()) {
            return new AlunosResource($alunos);
        }
    }

    public function update(Request $request)
    {
        $alunos = Alunos::findOrFail($request->id);
        $alunos->nome = $request->input('nome');
        $alunos->telefone = $request->input('telefone');
        $alunos->email = $request->input('email');
        $alunos->dataDeNascimento = $request->input('dataDeNascimento');
        $alunos->genero = $request->input('genero');

        if ($alunos->save()) {
            return new AlunosResource($alunos);
        }
    }

    public function getAll()
    {
        $alunos = Alunos::paginate(300);
        return AlunosResource::collection($alunos);
    }

    public function getByID($id)
    {
        $alunos = Alunos::findOrFail($id);
        return new AlunosResource($alunos);
    }

    public function delete($id)
    {
        $alunos = Alunos::findOrFail($id);
        if ($alunos->delete()) {
            return new AlunosResource($alunos);
        }
    }

    public function search($nome)
    {

        $alunos = Alunos::where('nome', 'like', '%' . $nome . '%')->get();

        return Alunos::collection($alunos);
    }
}
