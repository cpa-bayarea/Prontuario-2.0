<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Triagem;
use Illuminate\Http\Request;
use Session;

use App\Models\Grupo;
use App\Models\Supervisor;
use App\Models\Aluno;
use App\Models\Telefone;
use App\Models\TriagemItensGrupo;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\TriagemRequest;


class TriagemController extends Controller
{
    public function index() {

        $paciente = Paciente::where('pacientes.status_id','=',1)->get();

        return view('triagem.index',compact('paciente',$paciente));
    }

    public function create () {

        $paciente = new Paciente();

        $supervisores = Supervisor::all();
        $alunos = Aluno::all();
        $tipoAtendimentos = Grupo::find(1);
        $grupos = Grupo::find(2);
        $temporario = Grupo::find(3);

        return view('triagem.create', compact(
            'supervisores', $supervisores, 'alunos', $alunos, 'grupos',
            $grupos, 'tipoAtendimentos', $tipoAtendimentos, 'temporario', $temporario, 'paciente', $paciente
        ));
    }

    public function store(TriagemRequest $request) {

        $paciente = new Paciente();
       
        $paciente->nome = $request->nome;

        if($this->validaCPF($request->cpf)) {
            $paciente->cpf = $request->cpf;
        }else {
            Session::flash('error', 'Infome CPF Valido.');
            $paciente = new Paciente();

            $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();
            $alunos = Aluno::orderBy('tx_nome', 'asc')->get();
            $tipoAtendimentos = Grupo::find(1);
            $grupos = Grupo::find(2);
            $temporario = Grupo::find(3);
            // return Redirect::to('/triagem/create')->withInput();

            return view('triagem.create', compact(
                'supervisores', $supervisores,
                'alunos', $alunos,
                'grupos', $grupos,
                'tipoAtendimentos', $tipoAtendimentos,
                'temporario', $temporario,
                'paciente', $paciente
            ));
        }
        $paciente->rg = $request->rg;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->status_id = 1;
        $paciente->save();

        $telefone = new Telefone();
        $telefone->numero = $request->telefone;
        $telefone->paciente_id = $paciente->id;
        $telefone->save();

        $triagem = new Triagem();
        $triagem->aluno_id = $request->aluno;
        $triagem->supervisor_id = $request->supervisor;
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

    public function show()
    {
        //
    }

    public function edit($id) {

        $paciente = Paciente::find($id);

        $supervisores = Supervisor::orderBy('tx_nome', 'asc')->get();
        $alunos = Aluno::orderBy('tx_nome', 'asc')->get();
        $tipoAtendimentos = Grupo::find(1);
        $grupos = Grupo::find(2);
        $temporario = Grupo::find(3);

        return view('triagem.create', compact(
            'supervisores', $supervisores,
            'alunos', $alunos,
            'grupos', $grupos,
            'tipoAtendimentos', $tipoAtendimentos,
            'temporario', $temporario,
            'paciente', $paciente
        ));

    }

    public function update(TriagemRequest $request) {

    }

    public function destroy(Request $request) {

        $paciente = Paciente::find($request->paciente);
        $paciente->delete();
       
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect(route('triagem'));
    }

    protected function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}
