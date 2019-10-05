<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Triagem;
use App\Paciente;
use App\StatusDeCadastro;
use App\Telefone;
use App\Supervisor;

class TriagemController extends Controller
{
    public function index() {
     
        $supervisor = Supervisor::all();
        // dd($supervisor);
        return view('triagem.index');
    }

    public function store(Request $request) {

        $paciente = new Paciente($request->all());
        $paciente->id_status = 1;                   //id_status = 1 paciente pré cadastrado, contem apenas dados iniciais.
        $paciente->save();

        $triagem = new Triagem($request->all());
        $triagem->paciente_ids = $paciente->id;
        $triagem->save();

        // $telefone = new Telefone($request->all());
        // $telefone->paciente_id = $paciente->id;
        // $telefone->save();
        
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
