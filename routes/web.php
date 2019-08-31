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
