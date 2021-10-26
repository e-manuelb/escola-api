<?php

use Illuminate\Support\Facades\Route;

Route::post('/users/add', 'App\Http\Controllers\UsersController@save');
Route::post('/login', 'App\Http\Controllers\UsersController@login');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users/me', 'App\Http\Controllers\UsersController@me');
    Route::put('/users/update/{id}', 'App\Http\Controllers\UsersController@update');
    Route::get('/users/getAll', 'App\Http\Controllers\UsersController@getAll');
    Route::get('/users/get/{id}', 'App\Http\Controllers\UsersController@getByID');
    Route::get('/users/search/{name}', 'App\Http\Controllers\UsersController@search');
    Route::delete('/users/delete/{id}', 'App\Http\Controllers\UsersController@delete');
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('/escolas/delete/{id}', 'App\Http\Controllers\EscolasController@delete');
    Route::get('/escolas/get/{id}', 'App\Http\Controllers\EscolasController@getByID');
    Route::get('/escolas/getAll', 'App\Http\Controllers\EscolasController@getAll');
    Route::get('/escolas/search/{nomeEscola}', 'App\Http\Controllers\EscolasController@search');
    Route::post('/escolas/add', 'App\Http\Controllers\EscolasController@save');
    Route::put('/escolas/update/{id}', 'App\Http\Controllers\EscolasController@update');
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('/alunos/delete/{id}', 'App\Http\Controllers\AlunosController@delete');
    Route::get('/alunos/getAll', 'App\Http\Controllers\AlunosController@getAll');
    Route::get('/alunos/get/{id}', 'App\Http\Controllers\AlunosController@getByID');
    Route::get('/alunos/search/{nome}', 'App\Http\Controllers\AlunosController@search');
    Route::post('/alunos/add', 'App\Http\Controllers\AlunosController@save');
    Route::put('/alunos/update/{id}', 'App\Http\Controllers\AlunosController@update');
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/alunosDeTurmas/add', 'App\Http\Controllers\AlunosDeTurmasController@save');
    Route::put('/alunosDeTurmas/update/{id}', 'App\Http\Controllers\AlunosDeTurmasController@update');
    Route::get('/alunosDeTurmas/getAll', 'App\Http\Controllers\AlunosDeTurmasController@getAll');
    Route::get('/alunosDeTurmas/get/{id}', 'App\Http\Controllers\AlunosDeTurmasController@getByID');
    Route::get('/alunosDeTurmas/search/{nome}', 'App\Http\Controllers\AlunosDeTurmasController@search');
    Route::delete('/alunosDeTurmas/delete/{id}', 'App\Http\Controllers\AlunosDeTurmasController@delete');
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('/turmas/delete/{id}', 'App\Http\Controllers\TurmasController@delete');
    Route::post('/turmas/add', 'App\Http\Controllers\TurmasController@save');
    Route::put('/turmas/update/{id}', 'App\Http\Controllers\TurmasController@update');
    Route::get('/turmas/getAll', 'App\Http\Controllers\TurmasController@getAll');
    Route::get('/turmas/get/{id}', 'App\Http\Controllers\TurmasController@getByID');
    Route::get('/turmas/byEscola/{id_escola}', 'App\Http\Controllers\TurmasController@getByIDEscola');
    Route::get('/turmas/search/{nivelDeEnsino}', 'App\Http\Controllers\TurmasController@search');
});
