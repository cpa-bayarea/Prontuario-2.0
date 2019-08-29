<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Triagem;
use App\Grupo;
use App\GrupoItem;
use App\Paciente;

class TriagemController extends Controller
{
    public function index() {
     
        return view('triagem.index');

    }

    public function create() {
        //
    }

    public function store(Request $request) {
      
        $paciente = new Paciente($request->all());
        $triagem = new Triagem($request->all());
        $paciente->save();
        $triagem->id_pacientes = $paciente->id;
        $triagem->save();
        return redirect(route('triagem'));
    }

    public function show() {
        return view('triagem.show');
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
