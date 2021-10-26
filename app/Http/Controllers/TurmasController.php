<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmasRequest;
use App\Models\Turmas;
use App\Http\Resources\Turmas as TurmasResource;
use Illuminate\Http\Request;

class TurmasController extends Controller
{
    public function save(TurmasRequest $request)
    {
        $turmas = new Turmas;
        $turmas->ano = $request->input('ano');
        $turmas->nivelDeEnsino = $request->input('nivelDeEnsino');
        $turmas->serie = $request->input('serie');
        $turmas->turno = $request->input('turno');
        $turmas->id_escola = $request->input('id_escola');

        if ($turmas->save()) {
            return new TurmasResource($turmas);
        }
    }

    public function update(TurmasRequest $request)
    {
        $turmas = Turmas::findOrFail($request->id);
        $turmas->ano = $request->input('ano');
        $turmas->nivelDeEnsino = $request->input('nivelDeEnsino');
        $turmas->serie = $request->input('serie');
        $turmas->turno = $request->input('turno');
        $turmas->id_escola = $request->input('id_escola');

        if ($turmas->save()) {
            return new TurmasResource($turmas);
        }
    }

    public function getAll()
    {

        $turmas = Turmas::paginate(15);
        return TurmasResource::collection($turmas);
    }

    public function getByID($id)
    {
        $turmas = Turmas::findOrFail($id);
        return new TurmasResource($turmas);
    }

    public function getByIDEscola($id_escola)
    {
        $turmas = Turmas::findOrFail($id_escola);
        return new TurmasResource($turmas);
    }

    public function delete($id)
    {
        $turmas = Turmas::findOrFail($id);
        if ($turmas->delete()) {
            return new TurmasResource($turmas);
        }
    }

    public function search($nivelDeEnsino)
    {

        $turmas = Turmas::where('nivelDeEnsino', 'like', '%' . $nivelDeEnsino . '%')->get();

        return TurmasResource::collection($turmas);
    }
}
