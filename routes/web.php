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
Route::get('search/paciente/findById/{id}', 'PacienteController@findById')->name('paciente.find');
Route::post('/paciente', 'PacienteController@store')->name('paciente.store');
Route::post('/paciente/delete/{id}', 'PacienteController@delete')->name('paciente.delete');

Route::get('search/cidadebyuf/{id}', 'CidadeController@findCidadeByUf');

// Triagem
Route::get('/triagem', 'triagemController@index')->name('triagem');
Route::get('search/triagem/findById/{id}', 'triagemController@findById')->name('triagem.find');
Route::post('/triagem', 'triagemController@store')->name('triagem.store');
Route::post('/triagem/delete/{id}', 'triagemController@delete')->name('triagem.delete');
