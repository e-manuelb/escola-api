<?php

namespace App\Http\Controllers;

use App\Http\Requests\EscolasRequest;
use App\Models\Escolas;
use Illuminate\Http\Request;
use App\Http\Resources\Escolas as EscolasResource;
use App\Models\Enderecos;
use App\Models\Turmas;
use Illuminate\Support\Facades\DB;

class EscolasController extends Controller
{


    public function getByID($id)
    {
        $escolas = Escolas::findOrFail($id);
        return new EscolasResource($escolas);
    }

    public function delete($id)
    {
        $escolas = Escolas::findOrFail($id);
        if ($escolas->delete()) {
            return new EscolasResource($escolas);
        }
    }

    public function search($nomeEscola)
    {

        $escolas = Escolas::where('nomeEscola', 'like', '%' . $nomeEscola . '%')->get();

        return EscolasResource::collection($escolas);
    }


    public function save(EscolasRequest $request)
    {

        $escolas = Escolas::create($request->all());
        $endereco = new Enderecos($request->all());
        $endereco->id_escola = $escolas->id;
        $escolas->endereco()->create([
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
        ]);

        $escolas->nomeEscola = $request->input('nomeEscola');

        if ($escolas->save() and $endereco->save()) {
            return new EscolasResource($escolas);
        } else {
            return response()->json(['error' => 'Algo de errado ocorreu.']);
        }
    }

    public function update(EscolasRequest $request)
    {
        $escolas = Escolas::findOrFail($request->id);
        $escolas->nomeEscola = $request->input('nomeEscola');

        if ($escolas->save()) {
            return new EscolasResource($escolas);
        }
    }

    public function getAll()
    {
        $escolas = Escolas::paginate(15);
        return EscolasResource::collection($escolas);
    }
}
