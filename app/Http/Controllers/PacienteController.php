<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PacienteController extends AbstractController
{
    public function findById($id)
    {
        $paciente = $this->_model->find($id);

        return ['paciente' => $paciente, 'cidade' => $paciente->cidade()->with('uf')->get()];
    }

    public function store(Request $request)
    {
        if ($id = base64_decode($request->id)) {
            $this->_model = $this->_model->find($id);
        }
        $data = $request->toArray();
        $data['nu_cpf'] = str_replace(['.', '-'], '', $data['nu_cpf']);
        $data['nu_rg'] = str_replace('.', '', $data['nu_rg']);
        $data['nu_cep'] = str_replace('-', '', $data['nu_cep']);
        $this->_model->fill($data);
        $this->_model->save();
        Session::flash('success', 'Operação realizada com sucesso');
        return redirect()->route("{$this->_redirectSave}.index");
    }
}
