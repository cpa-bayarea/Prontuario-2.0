<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UF;
use Illuminate\Support\Facades\Redirect;


class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::with('telefones')->get();
        $ufs = UF::all();

        return view('paciente.index', compact('ufs', 'pacientes'));
    }

    public function findById($id)
    {
        $paciente = Paciente::find($id);

        return ['paciente' => $paciente, 'cidade' => $paciente->cidade()->with('uf')->get()];
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $ufs = UF::all();

        return view('paciente.create', compact('ufs', 'pacientes'));
    }

    public function store(Request $request)
    {

        if ($request->paciente_id) {
            $paciente = Paciente::find($request->paciente_id);
        } else {
            $paciente = new Paciente();
        }
        $paciente->id_status = 1;
        $paciente->fill($request->all());
        $paciente->save();

        if ($request->telefone) {

            $array = $request->all();
            $array['paciente_id'] = $paciente->id;

            if ((new TelefoneController)->store($array)) {
                Session::flash('success', 'Operação realizada com sucesso');
            } else {
                Session::flash('danger', 'Erro ao cadstrar o telefone');
            }
        }
        return Redirect::to('/paciente');

    }

    public function delete($id)
    {
        Paciente::find($id)->delete();
        Session::flash('success', 'Excluído com sucesso');
        return Redirect::to('paciente');
    }
}
