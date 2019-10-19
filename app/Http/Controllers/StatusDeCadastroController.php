<?php

namespace App\Http\Controllers;

use App\Models\StatusDeCadastro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class StatusDeCadastroController extends Controller
{
    public function index()
    {
        $aStatus = StatusDeCadastro::all();
        $status = new StatusDeCadastro();
        return view('paciente.status_de_cadastro.index', compact('aStatus', 'status'));
    }

    public function store(Request $request)
    {
        if ($request->id) {
            $status = StatusDeCadastro::find($request->id);
            $status->update($request->all());
            Session::flash('success', 'Cadastro de status atualizado com sucesso');
        } else {
            $status = new StatusDeCadastro($request->all());
            Session::flash('success', 'Cadastro de status realizado com sucesso');
        }

        $status->save();
        return redirect(route('status'));
    }

    public function edit($id)
    {
        $aStatus = StatusDeCadastro::all();
        $status = StatusDeCadastro::find($id);
        return view('paciente.status_de_cadastro.index', compact('aStatus', 'status'));
    }

    public function delete($id)
    {
        StatusDeCadastro::find($id)->delete();
        Session::flash('success', 'Excluído com sucesso');
        return redirect(route('status'));
    }
}
