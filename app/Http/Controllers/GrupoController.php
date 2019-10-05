<?php

namespace App\Http\Controllers;


use App\Grupo;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Validator;
class GrupoController extends Controller
{
    public function index()
    {
        $grupo = new Grupo();
        $grupos = Grupo::all();
        return view('grupo.index', compact('grupo', 'grupos'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
       
        $rules = array(
            'nome'  => 'required'
        );
        
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            Session::flash('error', 'Preencha os campos corretamente');
            return Redirect::back();
        }

    if($request->id){
        $grupo = Grupo::find($request->id);
        Session::flash('success', 'Atualizado com sucesso');
    }else{
        $grupo = new Grupo();
        Session::flash('success', 'Cadstrado com sucesso');
    }

        $grupo->fill($request->all());
        $grupo->save();

        return Redirect::to('grupos');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        $grupos = Grupo::all();
        return view('grupo.index', compact('grupo', 'grupos'));
    }
    public function update(Request $request, $id)
    {
        $grupo = Grupo::find($id);
        $grupo->fill($request->all());
        $grupo->save();
        Session::flash('success', 'Atualizado com sucesso');
        return Redirect::to('grupos');
    }
    public function destroy($id)
    {
        Grupo::find($id)->delete();
        Session::flash('success', 'Excluído com sucesso!');
        return Redirect::to('grupos');
    }

}
