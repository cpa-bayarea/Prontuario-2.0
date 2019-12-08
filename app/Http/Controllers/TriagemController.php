<?php

namespace App\Http\Controllers;

use App\Models\{Aluno, Grupo, StatusDeCadastro, Supervisor, Telefone, TriagemItensGrupo, Triagem, Paciente};
use Illuminate\Http\Request;
use App\Http\Requests\TriagemRequest;
use Session;

class TriagemController extends AbstractController
{
    public function index()
    {
        // Busca todos os pacientes que estao com o status pre-cadastrado. (??) ver pq nao buscar todos.
        $pacientes = Paciente::where('status_id', '=', StatusDeCadastro::STATUS_PRE_CADASTRADO)->get();
        return view('triagem.index', compact('pacientes', $pacientes));
    }

    public function create ()
    {
        $aDados                 = $this->_recuperarDados();
        $aDados['model']        = $this->_model;
        $aDados['supervisores'] = Supervisor::all();
        $aDados['terapeutas']   = Aluno::all();
        $aDados['paciente']     = new Paciente();

        $grupo = Grupo::whereIn('id', [1,2,3])->get();
        $aDados['tipoAtendimentos'] = $grupo[0];
        $aDados['grupos']           = $grupo[1];
        $aDados['temporario']       = $grupo[2];

        return view("{$this->_dirView}.formulario", $aDados);
    }

    public function store(Request $request)
    {
        try{
            if (!$this->_validarCPF($request->nu_cpf)) {
                Session::flash('error', 'Infome CPF Valido.');
                return $this->create();
            }
            $paciente = new Paciente();

            $paciente->tx_nome = $request->tx_nome;
            $paciente->nu_cpf  = str_replace(['.','-'], '', $request->nu_cpf);
            $paciente->nu_rg   = str_replace('.','', $request->nu_rg);
            $paciente->dt_nascimento = $request->dt_nascimento;
            $paciente->status_id = StatusDeCadastro::STATUS_PRE_CADASTRADO;
            $paciente->save();

            $telefone = new Telefone();
            $telefone->numero = $request->telefone;
            $telefone->paciente_id = $paciente->id;
            $telefone->save();

            $triagem = new Triagem();
            $triagem->aluno_id = $request->aluno_id;
            $triagem->supervisor_id = $request->supervisor_id;
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
            if ($request->outro != null) {
                $triagemItensGrupo->outro = $request->outro;
            }
            $triagemItensGrupo->save();

            Session::flash('success', 'Operação realizada com sucesso');
            return redirect()->route('triagem.index');
        } catch (\Exception $e) {
            return back()->with('error', 'Não foi possível realizar a operação!');
        }
    }

    public function edit($id)
    {
        $paciente = Paciente::find(base64_decode($id));
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

    public function update(TriagemRequest $request)
    {

    }

    public function destroy($request)
    {
        dd($request->all());
        $paciente = Paciente::find($request->paciente);
        $paciente->delete();
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect(route('triagem'));
    }

    protected function _validarCPF($cpf)
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

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
