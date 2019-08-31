<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/paciente', 'PacienteController@index')->name('paciente');
    Route::get('search/paciente/findById/{id}', 'PacienteController@findById')->name('paciente.find');
    Route::post('/paciente', 'PacienteController@store')->name('paciente.store');
    Route::post('/paciente/delete/{id}', 'PacienteController@delete')->name('paciente.delete');

    Route::get('search/cidadebyuf/{id}', 'CidadeController@findCidadeByUf');


    /**  Rotas de Linhas Teóricas **/
    Route::get('/linha_teorica', 'LinhaTeoricaController@index')->name('linha_teorica.index');
    Route::get('/linha_teorica/create', 'LinhaTeoricaController@create')->name('linha_teorica.create');
    Route::post('/linha_teorica/store', 'LinhaTeoricaController@store')->name('linha_teorica.store');
    Route::get('/linha_teorica/edit/{id}', 'LinhaTeoricaController@edit')->name('linha_teorica.edit');
    Route::post('/linha_teorica/delete/{id}', 'LinhaTeoricaController@destroy')->name('linha_teorica.delete');

    /**  Rotas de Supervisores **/
    Route::get('/supervisor', 'SupervisorController@index')->name('supervisor.index');
    Route::get('/supervisor/create', 'SupervisorController@create')->name('supervisor.create');
    Route::post('/supervisor/store', 'SupervisorController@store')->name('supervisor.store');
    Route::get('/supervisor/edit/{id}', 'SupervisorController@edit')->name('supervisor.edit');
    Route::post('/supervisor/delete/{id}', 'SupervisorController@destroy')->name('supervisor.delete');

    /**  Rotas de Alunos **/
    Route::get('/aluno', 'AlunoController@index')->name('aluno.index');
    Route::get('/aluno/create', 'AlunoController@create')->name('aluno.create');
    Route::post('/aluno/store', 'AlunoController@store')->name('aluno.store');
    Route::get('/aluno/edit/{id}', 'AlunoController@edit')->name('aluno.edit');
    Route::post('/aluno/delete/{id}', 'AlunoController@destroy')->name('aluno.delete');

    /**  Rotas de Agendamentos **/
    Route::get('/agendamento', 'AgendamentoController@index')->name('agendamento.index');


});
