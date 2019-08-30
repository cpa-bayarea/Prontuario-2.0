<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StatusDeCadastro;
use Session;

class StatusDeCadastroController extends Controller
{
    public function index() {
 
        $status = StatusDeCadastro::all();
        return view('paciente.status_de_cadastro.index');
    }

    public function store(Request $request) {
    
        $status = new StatusDeCadastro($request->all());
        $status->save();
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect(route('status'));
    }
}
