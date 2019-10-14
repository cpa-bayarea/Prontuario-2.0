<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Triagem;
use App\Paciente;

use App\Grupo;
use App\Supervisor;
use App\Aluno;
use App\Telefone;
use App\TriagemItensGrupo;
use Illuminate\Support\Facades\DB;

class TriagemController extends Controller
{
    public function index() {

        $paciente = Paciente::where('pacientes.id_status','=',1)->get();

        // foreach ($paciente as $key) {
        //     dd($key->triagem->aluno->tx_nome);
        //     dd($key->status->status);
           
        //         echo $key->triagem->aluno->tx_nome;
        // } 

        return view('triagem.index',compact('paciente',$paciente));
    }

    public function create () {

        $paciente = new Paciente();

        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();
        $alunos = Aluno::orderBy('tx_nome', 'asc')->get();
        $tipoAtendimentos = Grupo::find(1);
        $grupos = Grupo::find(2);
        $temporario = Grupo::find(3);

        return view('triagem.create',compact('supervisores',$supervisores,'alunos',$alunos,'grupos',$grupos,'tipoAtendimentos',$tipoAtendimentos,'temporario',$temporario,'paciente',$paciente));
    }

    public function store(Request $request) {

        $paciente = new Paciente();
        $paciente->nome = $request->nome;
        $paciente->cpf = $request->cpf;
        $paciente->rg = $request->rg;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->id_status = 1;
        $paciente->save();

        $telefone = new Telefone();
        $telefone->numero = $request->telefone;
        $telefone->paciente_id = $paciente->id;
        $telefone->save();

        $triagem = new Triagem();
        $triagem->alunos_id = $request->aluno;
        $triagem->supervisors_id = $request->supervisor;
        $triagem->paciente_id = $paciente->id;
        $triagem->queixa_principal = $request->queixa_principal;
        $triagem->save();

        $triagemItensGrupo = new TriagemItensGrupo();
        $triagemItensGrupo->triagems_id = $triagem->id;
        $triagemItensGrupo->grupo_items_id = $request->atendimento;
    
        $triagemItensGrupo->save();

        $triagemItensGrupo->triagems_id = $triagem->id;
        $triagemItensGrupo->grupo_items_id = $request->grupo;
       
        $triagemItensGrupo->save();

        $triagemItensGrupo->triagems_id = $triagem->id;
        $triagemItensGrupo->grupo_items_id = $request->temporario;
        if($request->outro != null) {
            $triagemItensGrupo->outro = $request->outro;
        }
        $triagemItensGrupo->save();

        
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect(route('triagem'));
    }

    public function show() {
       //
    }


    public function edit($id) {

        $paciente = Paciente::find($id);

        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();
        $alunos = Aluno::orderBy('tx_nome', 'asc')->get();
        $tipoAtendimentos = Grupo::find(1);
        $grupos = Grupo::find(2);
        $temporario = Grupo::find(3);

        return view('triagem.create',compact('supervisores',$supervisores,
                                             'alunos',$alunos,
                                             'grupos',$grupos,
                                             'tipoAtendimentos',$tipoAtendimentos,
                                             'temporario',$temporario,
                                             'paciente',$paciente)
                                            );

    }

    public function update() {
        //
    }

    public function destroy(Request $request) {

        $paciente = Paciente::find($request->paciente);
        $paciente->delete();
       
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect(route('triagem'));
    }
}
