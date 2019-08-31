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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/paciente', 'PacienteController@index')->name('paciente');
Route::get('/paciente/create', 'PacienteController@create')->name('paciente.create');
Route::get('search/paciente/findById/{id}', 'PacienteController@findById')->name('paciente.find');
Route::post('/paciente', 'PacienteController@store')->name('paciente.store');
Route::post('/paciente/delete/{id}', 'PacienteController@delete')->name('paciente.delete');

Route::get('search/cidadebyuf/{id}', 'CidadeController@findCidadeByUf');

// Triagem
Route::get('/triagem', 'triagemController@index')->name('triagem');
Route::get('/triagem/show', 'triagemController@show')->name('triagem.show');
Route::get('triagem/edit/{id}','triagemController@edit')->name('triagem.edit');
Route::post('/triagem', 'triagemController@store')->name('triagem.store');
Route::post('/triagem/delete/{id}', 'triagemController@delete')->name('triagem.delete');

// Status_de_cadastro
Route::get('/status', 'StatusDeCadastroController@index')->name('status');
Route::get('/status/show', 'StatusDeCadastroController@show')->name('status.show');
Route::get('/status/edit/{id}', 'StatusDeCadastroController@edit')->name('status.edit');
Route::post('/status', 'StatusDeCadastroController@store')->name('status.store');
Route::post('/status/delete/{id}', 'StatusDeCadastroController@delete')->name('status.delete');

Route::get('search/telefonebypacienteid/{paciente_id}', 'TelefoneController@findTelefoneByPaciente')->name('telefone.by.paciente');
Route::post('telefone/delete/{id}','TelefoneController@destroy')->name('telefone.destroy');
Route::post('telefone','TelefoneController@store')->name('telefone.store');
Route::post('telefone/create','TelefoneController@create')->name('telefone.create');


Route::get('grupos','GrupoController@index')->name('grupos');
Route::post('grupos','GrupoController@store')->name('grupos.store');
Route::get('grupos/edit/{id}','GrupoController@edit')->name('grupos.edit');
Route::post('grupos/{id}','GrupoController@destroy')->name('grupos.destroy');

Route::get('grupoitens/{grupo_id}','GrupoItemController@index')->name('grupoItem');
Route::post('grupoitens','GrupoItemController@store')->name('grupoItem.store');
Route::get('grupoitens/edit/{id}','GrupoItemController@edit')->name('grupoItem.edit');
Route::post('grupoitens/{id}','GrupoItemController@destroy')->name('grupoItem.destroy');
