<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Http\Controllers\AbstractController;
use App\Paciente;
use App\Prontuario;
use App\ProntuarioStatus;
use App\Supervisor;
use Illuminate\Http\Request;

class ProntuarioController extends AbstractController
{
    protected function _recuperarDados()
    {
        $aPacientes = Paciente::all();
        $aAlunos = Aluno::all();
        $aProntuarioStatus = ProntuarioStatus::all();

        return compact('aAlunos', 'aPacientes', 'aProntuarioStatus');
    }
}
