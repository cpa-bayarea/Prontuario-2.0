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
        return view('paciente.status_de_cadastro.index',compact('status'));
    }

    public function store(Request $request) {
    
        $status = new StatusDeCadastro($request->all());
        $status->save();
        Session::flash('success', 'Cadastro de status realizado com sucesso');
        return redirect(route('status'));
    }
    public function delete($id){

        StatusDeCadastro::find($id)->delete();
        Session::flash('success', 'Excluído com sucesso');
        return redirect(route('status'));
    }
}
