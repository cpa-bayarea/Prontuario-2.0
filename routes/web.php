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
Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'AgendamentoController@index');

    Route::group(['middleware' => 'role'], function () {

        Route::get('/paciente', 'PacienteController@index')->name('paciente');
        Route::get('/paciente/create', 'PacienteController@create')->name('paciente.create');
        Route::get('search/paciente/findById/{id}', 'PacienteController@findById')->name('paciente.find');
        Route::post('/paciente', 'PacienteController@store')->name('paciente.store');
        Route::post('/paciente/delete/{id}', 'PacienteController@delete')->name('paciente.delete');

        Route::get('search/cidadebyuf/{id}', 'CidadeController@findCidadeByUf');

        // Triagem
        Route::get('/triagem/{id}/destroy', 'TriagemController@destroy')->name('triagem.delete');
        Route::resource('/triagem', 'TriagemController');
        /*Route::get('/triagem', 'TriagemController@index')->name('triagem');
        Route::get('/triagem/create', 'TriagemController@create')->name('triagem.create');
        Route::get('/triagem/show', 'TriagemController@show')->name('triagem.show');
        Route::get('triagem/edit/{id}', 'TriagemController@edit')->name('triagem.edit');
        Route::post('/triagem', 'TriagemController@store')->name('triagem.store');
        Route::post('/triagem/delete', 'TriagemController@destroy')->name('triagem.delete');*/

        /**  Rotas de Status_de_cadastro **/
        Route::resource('/statusdecadastro', 'StatusDeCadastroController');
        Route::get('/statusdecadastro/{id}/destroy', 'StatusDeCadastroController@destroy')->name('statusdecadastro.delete');

        Route::get('search/telefonebypacienteid/{paciente_id}', 'TelefoneController@findTelefoneByPaciente')->name('telefone.by.paciente');
        Route::post('telefone/delete/{id}', 'TelefoneController@destroy')->name('telefone.destroy');
        Route::post('telefone', 'TelefoneController@store')->name('telefone.store');
        Route::post('telefone/create', 'TelefoneController@create')->name('telefone.create');


        /**  Rotas de Grupos **/
        Route::resource('/grupo', 'GrupoController');
        Route::get('/grupo/{id}/destroy', 'GrupoController@destroy')->name('grupo.delete');

        /**  Rotas de Grupo Itens **/
        Route::resource('/grupoitens', 'GrupoItemController');
        Route::get('/grupoitens/{id}/destroy', 'GrupoItemController@destroy')->name('grupoitens.delete');
        Route::get('/grupoitens/grupo/{id}', 'GrupoItemController@getById')->name('grupoitens.findId');

        Route::get('/home', 'HomeController@index')->name('home');

        /**  Rotas de Linhas Teóricas **/
        Route::resource('linhateorica', 'LinhaTeoricaController');
        Route::get('/linhateorica/{id}/destroy', 'LinhaTeoricaController@destroy')->name('linhateorica.delete');

        /**  Rotas de Supervisores **/
        Route::resource('supervisor', 'SupervisorController');
        Route::get('/supervisor/{id}/destroy', 'SupervisorController@destroy')->name('supervisor.delete');
        Route::get('/supervisor/{nu_crp}/crp', 'SupervisorController@searchCrp')->name('supervisor.search-crp');


        /**  Rotas de Alunos **/
        Route::get('/aluno', 'AlunoController@index')->name('aluno.index');
        Route::get('/aluno/create', 'AlunoController@create')->name('aluno.create');
        Route::post('/aluno/store', 'AlunoController@store')->name('aluno.store');
        Route::get('/aluno/edit/{id}', 'AlunoController@edit')->name('aluno.edit');
        Route::post('/aluno/delete/{id}', 'AlunoController@destroy')->name('aluno.delete');

        /**  Rotas de Agendamentos **/
        Route::get('/agendamento', 'AgendamentoController@index')->name('agendamento.index');
        Route::post('/agendamento/store', 'AgendamentoController@store')->name('agendamento.store');
        Route::get('search/agendamento/findById/{id}', 'AgendamentoController@findById')->name('agendamento.byid');
        Route::get('/agendamento/changestatus/{id}/{status_id}', 'AgendamentoController@changeStatus')->name('agendamento.changeStatus');
        Route::get('/agendamento/delete/{id}', 'AgendamentoController@destroy')->name('agendamento.delete');
        Route::resource('/agendamentostatus', 'AgendamentoStatusController');
        Route::get('/agendamentostatus/{id}/destroy', 'AgendamentoStatusController@destroy');

        Route::resource('prontuario', 'ProntuarioController');
        Route::get('search/prontuario/findByPacienteId/{id}', 'ProntuarioController@findByPacienteId')->name('prontuario.findByPacienteId');
        Route::get('/prontuario/{id}/destroy', 'ProntuarioController@destroy');

        Route::resource('users', 'UserController');
        Route::get('/users/{id}/destroy', 'UserController@destroy')->name('users.delete');
        Route::get('/users/{username}/search', 'UserController@searchUsername')->name('users.search-username');
        Route::get('/users/{email}/email', 'UserController@searchEmail')->name('users.search-email');

        Route::resource('prontuariostatus', 'ProntuarioStatusController');
        Route::get('/prontuariostatus/{id}/destroy', 'ProntuarioStatusController@destroy')->name('prontuariostatus.delete');

        /* Rotas da Permissions */
        Route::resource('/permissao', 'PermissionController');
        Route::post('/updatePermission', 'PermissionController@updatePermissions')->name('permissao.updatePermissions');
    });
});
