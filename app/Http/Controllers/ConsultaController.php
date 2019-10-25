<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Supervisor;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::all();
        $alunos = Aluno::orderBy('tx_nome', 'asc')->get();
        $pacientes = Paciente::orderBy('nome', 'asc')->get();
        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();

        return view("consulta.index", compact('consultas', 'alunos', 'supervisores', 'pacientes'));
    }

    public function create($id_paciente, $id_aluno)
    {
        $alunos = Aluno::orderBy('tx_nome', 'asc')->get();
        $pacientes = Paciente::orderBy('nome', 'asc')->get();
        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();

        $aluno = Aluno::find($id_aluno);
        $paciente = Paciente::find($id_paciente);

        return view("consulta.formulario", compact('aluno', 'paciente', 'alunos', 'pacientes', 'supervisores'));
    }

    public function store(Request $request)
    {
        if (!empty($request['id'])) {
            return $this->update($request, $request['id']);
        }

        $consulta = new Consulta();

        $consulta->paciente_id = $request->paciente_id;
        $consulta->data = $request->data;
        $consulta->supervisor_id = $request->supervisor_id;
        $consulta->aluno_id = $request->aluno_id;
        $consulta->relato = $request->relato;

        $consulta->save();
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->route('consulta');
    }

    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $alunos = Aluno::orderBy('tx_nome', 'asc')->get();
        $pacientes = Paciente::orderBy('nome', 'asc')->get();
        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();

        return view('consulta.edit', compact('consulta', 'alunos', 'supervisores', 'pacientes'));
    }

    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);

        $consulta->paciente_id = $request->paciente_id;
        $consulta->data = $request->data;
        $consulta->supervisor_id = $request->supervisor_id;
        $consulta->aluno_id = $request->aluno_id;
        $consulta->relato = $request->relato;

        $consulta->save();
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->route('consulta');
    }
}
