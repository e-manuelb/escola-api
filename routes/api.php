<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AlunosDeTurmasController;
use App\Http\Controllers\EscolasController;
use App\Http\Controllers\TurmasController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// ROTAS PÚBLICAS
Route::post('users/add', [UsersController::class, 'save']);
Route::post('login/', [UsersController::class, 'login']);
// ROTAS USUÁRIOS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('users/me', [UsersController::class, 'me']);
    Route::get('users/getAll', [UsersController::class, 'getAll']);
    Route::get('users/{id}', [UsersController::class, 'getByID']);
    Route::get('users/search/{name}', [UsersController::class, 'search']);
    Route::put('users/update/{id}', [UsersController::class, 'update']);
    Route::delete('users/delete/{id}', [UsersController::class, 'delete']);
});
// ROTAS ESCOLAS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('escolas/getAll', [EscolasController::class, 'getAll']);
    Route::get('escolas/{id}', [EscolasController::class, 'getByID']);
    Route::get('escolas/search/{nomeEscola}', [EscolasController::class, 'search']);
    Route::post('escolas/add', [EscolasController::class, 'save']);
    Route::put('escolas/update/{id}', [EscolasController::class, 'update']);
    Route::delete('escolas/delete/{id}', [EscolasController::class, 'delete']);
});
// ROTAS ALUNOS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('alunos/getAll', [AlunosController::class, 'getAll']);
    Route::get('alunos/{id}', [AlunosController::class, 'getByID']);
    Route::get('alunos/search/{nome}', [AlunosController::class, 'search']);
    Route::post('alunos/add', [AlunosController::class, 'save']);
    Route::put('alunos/update', [AlunosController::class, 'update']);
    Route::delete('alunos/delete/{id}', [AlunosController::class, 'delete']);
});
// ROTAS ALUNOS DE TURMAS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('alunosDeTurmas/getAll', [AlunosDeTurmasController::class, 'getAll']);
    Route::get('alunosDeTurmas/{id}', [AlunosDeTurmasController::class, 'getByID']);
    Route::get('alunosDeTurmas/search/{nome}', [AlunosDeTurmasController::class, 'search']);
    Route::post('alunosDeTurmas/add', [AlunosDeTurmasController::class, 'save']);
    Route::put('alunosDeTurmas/update', [AlunosDeTurmasController::class, 'update']);
    Route::delete('alunosDeTurmas/delete/{id}', [AlunosDeTurmasController::class, 'delete']);
});
// ROTAS TURMAS
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('turmas/getAll', [TurmasController::class, 'getAll']);
    Route::get('turmas/{id}', [TurmasController::class, 'getByID']);
    Route::get('turmas/byEscola/{id_escola}', [TurmasController::class, 'getByIDEscola']);
    Route::get('turmas/search/{nivelDeEnsino}', [TurmasController::class, 'search']);
    Route::post('turmas/add', [TurmasController::class, 'save']);
    Route::put('turmas/update', [TurmasController::class, 'update']);
    Route::delete('turmas/delete/{id}', [TurmasController::class, 'delete']);
});
