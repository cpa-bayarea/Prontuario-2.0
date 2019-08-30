<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Triagem;
use App\Paciente;
use App\StatusDeCadastro;
use App\Telefone;

class TriagemController extends Controller
{
    public function index() {
     
        return view('triagem.index');
    }

    public function store(Request $request) {
      
        $paciente = new Paciente($request->all());
        $paciente->id_status = 1;                   //id_status = 1 paciente pré cadastrado, contem apenas dados iniciais.
        $triagem = new Triagem($request->all());
        $paciente->save();
        $triagem->id_pacientes = $paciente->id;
        $triagem->save();
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect(route('triagem'));
    }

    public function show() {
       //
    }


    public function edit() {
       //
    }

    public function update() {
        //
    }

    public function destroy() {
        //
    }
}
