<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Triagem;
use App\Grupo;
use App\GrupoItem;

class TriagemController extends Controller
{
    public function index()
    {
        // $triagem = new Triagem;
        // $triagem = Triagem::find(1);
        $grupo = GrupoItem::find(1);

        dd($grupo->grupo());

        // dd($triagem->paciente());

        return view('triagem.index');

    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show()
    {
        //
    }


    public function edit()
    {
       
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
