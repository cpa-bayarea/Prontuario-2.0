<?php

namespace App\Http\Controllers;



use App\Models\Paciente;
use App\Models\Prontuario;
use App\Models\ProntuarioStatus;
use App\Models\TbAluno;

class ProntuarioController extends AbstractController
{
    protected function _recuperarDados()
    {
        $aPacientes = Paciente::all();
        $aAlunos = TbAluno::all();
        $aProntuarioStatus = ProntuarioStatus::all();

        return compact('aAlunos', 'aPacientes', 'aProntuarioStatus');
    }

    public function  findByPacienteId($pacienteId)
    {
        $prontuario = Prontuario::where('paciente_id', $pacienteId)->get();
        if (count($prontuario) > 0) {
            return ['prontuario' => $prontuario];
        }
        return "";
    }

    public function createByAgendamento($request)
    {
        $prontuario = new Prontuario();

        $prontuario->numero               = 0;
        $prontuario->aluno_id             = $request->aluno_id;
        $prontuario->paciente_id          = $request->paciente_id;
        $prontuario->prontuario_status_id = 1;
        $prontuario->valor                = 0;

        $prontuario->save();
    }
}
