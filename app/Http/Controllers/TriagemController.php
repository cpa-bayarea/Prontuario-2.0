<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Triagem;

class TriagemController extends Controller
{
    public function index()
    {
        $triagem = Triagem::all();
        dd($triagem);

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
