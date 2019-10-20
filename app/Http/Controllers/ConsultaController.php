<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Base\Supervisor;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConsultaController extends Controller
{
    public function index()
    {
        $alunos       = Aluno::orderBy('tx_nome', 'asc')->get();
        $pacientes    = Paciente::orderBy('nome', 'asc')->get();
        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();

        return view("consulta.index", compact('alunos','supervisores','pacientes'));
    }

    public function create($id_paciente, $id_aluno)
    {
        $alunos       = Aluno::orderBy('tx_nome', 'asc')->get();
        $pacientes    = Paciente::orderBy('nome', 'asc')->get();
        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();

        $aluno = Aluno::find($id_aluno);
        $paciente = Paciente::find($id_paciente);

        return view("consulta.formulario", compact('aluno', 'paciente', 'alunos', 'pacientes', 'supervisores'));
    }

    public function store(Request $request)
    {
        $consulta = new Consulta();

        $consulta->paciente_id = $request->paciente_id;
        $consulta->data = $request->data;
        $consulta->supervisor_id = $request->supervisor_id;
        $consulta->aluno_id = $request->aluno_id;
        $consulta->relato = $request->relato;

        $consulta->save();
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->route('agendamento.index');
    }
}
