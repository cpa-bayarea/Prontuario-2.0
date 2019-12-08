<?php

use Illuminate\Database\Seeder;
use \App\Models\Permission as Permissao;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissao::create(['nome' => 'log-viewer::dashboard']);
        Permissao::create(['nome' => 'log-viewer::logs.list']);
        Permissao::create(['nome' => 'log-viewer::logs.delete']);
        Permissao::create(['nome' => 'log-viewer::logs.show']);
        Permissao::create(['nome' => 'log-viewer::logs.download']);
        Permissao::create(['nome' => 'log-viewer::logs.filter']);
        Permissao::create(['nome' => 'log-viewer::logs.search']);
        Permissao::create(['nome' => 'login']);
        Permissao::create(['nome' => 'logout']);
        Permissao::create(['nome' => 'register']);
        Permissao::create(['nome' => 'password.request']);
        Permissao::create(['nome' => 'password.email']);
        Permissao::create(['nome' => 'password.reset']);
        Permissao::create(['nome' => 'password.update']);
        Permissao::create(['nome' => 'home']);
        Permissao::create(['nome' => 'paciente']);
        Permissao::create(['nome' => 'paciente.create']);
        Permissao::create(['nome' => 'paciente.find']);
        Permissao::create(['nome' => 'paciente.store']);
        Permissao::create(['nome' => 'paciente.delete']);
        Permissao::create(['nome' => 'triagem.index']);
        Permissao::create(['nome' => 'triagem.create']);
        Permissao::create(['nome' => 'triagem.show']);
        Permissao::create(['nome' => 'triagem.edit']);
        Permissao::create(['nome' => 'triagem.store']);
        Permissao::create(['nome' => 'triagem.delete']);
        Permissao::create(['nome' => 'statusdecadastro.index']);
        Permissao::create(['nome' => 'statusdecadastro.create']);
        Permissao::create(['nome' => 'statusdecadastro.store']);
        Permissao::create(['nome' => 'statusdecadastro.show']);
        Permissao::create(['nome' => 'statusdecadastro.edit']);
        Permissao::create(['nome' => 'statusdecadastro.update']);
        Permissao::create(['nome' => 'statusdecadastro.destroy']);
        Permissao::create(['nome' => 'statusdecadastro.delete']);
        Permissao::create(['nome' => 'telefone.by.paciente']);
        Permissao::create(['nome' => 'telefone.destroy']);
        Permissao::create(['nome' => 'telefone.store']);
        Permissao::create(['nome' => 'telefone.create']);
        Permissao::create(['nome' => 'grupo.index']);
        Permissao::create(['nome' => 'grupo.create']);
        Permissao::create(['nome' => 'grupo.store']);
        Permissao::create(['nome' => 'grupo.show']);
        Permissao::create(['nome' => 'grupo.edit']);
        Permissao::create(['nome' => 'grupo.update']);
        Permissao::create(['nome' => 'grupo.destroy']);
        Permissao::create(['nome' => 'grupo.delete']);
        Permissao::create(['nome' => 'grupoitens.index']);
        Permissao::create(['nome' => 'grupoitens.create']);
        Permissao::create(['nome' => 'grupoitens.store']);
        Permissao::create(['nome' => 'grupoitens.show']);
        Permissao::create(['nome' => 'grupoitens.edit']);
        Permissao::create(['nome' => 'grupoitens.update']);
        Permissao::create(['nome' => 'grupoitens.destroy']);
        Permissao::create(['nome' => 'grupoitens.delete']);
        Permissao::create(['nome' => 'grupoitens.findId']);
        Permissao::create(['nome' => 'linhateorica.index']);
        Permissao::create(['nome' => 'linhateorica.create']);
        Permissao::create(['nome' => 'linhateorica.store']);
        Permissao::create(['nome' => 'linhateorica.show']);
        Permissao::create(['nome' => 'linhateorica.edit']);
        Permissao::create(['nome' => 'linhateorica.update']);
        Permissao::create(['nome' => 'linhateorica.destroy']);
        Permissao::create(['nome' => 'linhateorica.delete']);
        Permissao::create(['nome' => 'supervisor.index']);
        Permissao::create(['nome' => 'supervisor.create']);
        Permissao::create(['nome' => 'supervisor.store']);
        Permissao::create(['nome' => 'supervisor.show']);
        Permissao::create(['nome' => 'supervisor.edit']);
        Permissao::create(['nome' => 'supervisor.update']);
        Permissao::create(['nome' => 'supervisor.destroy']);
        Permissao::create(['nome' => 'supervisor.delete']);
        Permissao::create(['nome' => 'supervisor.search-crp']);
        Permissao::create(['nome' => 'aluno.index']);
        Permissao::create(['nome' => 'aluno.create']);
        Permissao::create(['nome' => 'aluno.store']);
        Permissao::create(['nome' => 'aluno.edit']);
        Permissao::create(['nome' => 'aluno.delete']);
        Permissao::create(['nome' => 'agendamento.index']);
        Permissao::create(['nome' => 'agendamento.store']);
        Permissao::create(['nome' => 'agendamento.byid']);
        Permissao::create(['nome' => 'agendamento.changeStatus']);
        Permissao::create(['nome' => 'agendamento.delete']);
        Permissao::create(['nome' => 'agendamentostatus.index']);
        Permissao::create(['nome' => 'agendamentostatus.create']);
        Permissao::create(['nome' => 'agendamentostatus.store']);
        Permissao::create(['nome' => 'agendamentostatus.show']);
        Permissao::create(['nome' => 'agendamentostatus.edit']);
        Permissao::create(['nome' => 'agendamentostatus.update']);
        Permissao::create(['nome' => 'agendamentostatus.destroy']);
        Permissao::create(['nome' => 'prontuario.index']);
        Permissao::create(['nome' => 'prontuario.create']);
        Permissao::create(['nome' => 'prontuario.store']);
        Permissao::create(['nome' => 'prontuario.show']);
        Permissao::create(['nome' => 'prontuario.edit']);
        Permissao::create(['nome' => 'prontuario.update']);
        Permissao::create(['nome' => 'prontuario.destroy']);
        Permissao::create(['nome' => 'prontuario.findByPacienteId']);
        Permissao::create(['nome' => 'users.index']);
        Permissao::create(['nome' => 'users.create']);
        Permissao::create(['nome' => 'users.store']);
        Permissao::create(['nome' => 'users.show']);
        Permissao::create(['nome' => 'users.edit']);
        Permissao::create(['nome' => 'users.update']);
        Permissao::create(['nome' => 'users.destroy']);
        Permissao::create(['nome' => 'users.delete']);
        Permissao::create(['nome' => 'users.search-username']);
        Permissao::create(['nome' => 'users.search-email']);
        Permissao::create(['nome' => 'prontuariostatus.index']);
        Permissao::create(['nome' => 'prontuariostatus.create']);
        Permissao::create(['nome' => 'prontuariostatus.store']);
        Permissao::create(['nome' => 'prontuariostatus.show']);
        Permissao::create(['nome' => 'prontuariostatus.edit']);
        Permissao::create(['nome' => 'prontuariostatus.update']);
        Permissao::create(['nome' => 'prontuariostatus.destroy']);
        Permissao::create(['nome' => 'prontuariostatus.delete']);
        Permissao::create(['nome' => 'permissao.index']);
        Permissao::create(['nome' => 'permissao.create']);
        Permissao::create(['nome' => 'permissao.store']);
        Permissao::create(['nome' => 'permissao.show']);
        Permissao::create(['nome' => 'permissao.edit']);
        Permissao::create(['nome' => 'permissao.update']);
        Permissao::create(['nome' => 'permissao.destroy']);
        Permissao::create(['nome' => 'permissao.updatePermissions']);
    }
}
