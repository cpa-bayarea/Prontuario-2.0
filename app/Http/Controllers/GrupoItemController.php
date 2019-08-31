<?php

namespace App\Http\Controllers;

use App\GrupoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class GrupoItemController extends Controller
{
    public function index($id)
    {
        $grupoIten = new GrupoItem();
        $grupoItens = GrupoItem::where('grupo_id',$id)->get();
        return view('grupo.grupoitem.index', compact('grupoIten', 'grupoItens','id'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        if($request->id){
            $grupoIten = GrupoItem::find($request->id);
            Session::flash('success', 'Atualizado com sucesso');
        }else{
            $grupoIten = new GrupoItem();
            Session::flash('success', 'Cadstrado com sucesso');
        }

        $grupoIten->fill($request->all());
        $grupoIten->save();

        return Redirect::to('/grupoitens/'.$grupoIten->grupo->id);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $grupoIten = GrupoItem::find($id);
        $grupoItens = GrupoItem::where('grupo_id',$grupoIten->grupo->id)->get();
        $id = $grupoIten->grupo->id;
        return view('grupo.grupoitem.index', compact('grupoIten', 'grupoItens','id'));
    }
    public function update(Request $request, $id)
    {
        $grupoIten = GrupoItem::find($id);
        $grupoIten->fill($request->all());
        $grupoIten->save();
        Session::flash('success', 'Atualizado com sucesso');

    }
    public function destroy($id)
    {
        GrupoItem::find($id)->delete();
        Session::flash('success', 'Excluído com sucesso!');
        return Redirect::to('grupos');
    }
}
