<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Session;
use App\UF;
use Redirect;

class PacienteController extends Controller
{
    public function index(){
        $pacientes = Paciente::all();
        $ufs = UF::all();


       return view('paciente.index',compact('ufs','pacientes'));
    }


    public function findById($id){

        $paciente = Paciente::find($id);
        return ['paciente'=>$paciente , 'cidade'=>$paciente->cidade()->with('uf')->get()];

      }


    public function store(Request $request)
    {

        if($request->paciente_id){
            $paciente = Paciente::find($request->paciente_id);
        }else{
            $paciente = new Paciente();
        }

        $paciente->fill($request->all());
        $paciente->save();
        Session::flash('success', 'Operação realizada com sucesso');
        return Redirect::to('paciente');
    }

    public function delete($id){

        Paciente::find($id)->delete();
        Session::flash('success', 'Excluído com sucesso');
        return Redirect::to('paciente');

    }
}
