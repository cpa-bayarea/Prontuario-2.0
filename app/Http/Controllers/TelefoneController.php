<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TelefoneController extends Controller
{
    public function index($paciente_id)
    {
        return Telefone::where('paciente_id', $paciente_id)->get();
    }


    /**
     * @param array $aTelefone ['numero (00) 00000-0000', 'paciente_id?', 'id?']
     * @return bool
     */
    public function store(array $aTelefone)
    {

        if (isset($aTelefone['id'])) {
            $telefone = Telefone::find($aTelefone['id']);
        } else {
            $telefone = new Telefone();
        }
        $dataTelefone = $this->_separarDddNumero($aTelefone['telefone']);
        $dataTelefone['paciente_id'] = $aTelefone['paciente_id'];
        $telefone->fill($dataTelefone);
        $telefone->save();

        return true;
    }

    public function create(Request $request)
    {

        if ($request->paciente_id == '' || $request->paciente_id == null && $request->telefone == '' || $request->telefone == null) {
            return false;
        }

        $telefone = new Telefone();

        $dataTelefone = $this->_separarDddNumero($request->telefone);
        $dataTelefone['paciente_id'] = $request->paciente_id;
        $telefone->fill($dataTelefone);
        $telefone->save();

        return $this->findTelefoneByPaciente($dataTelefone['paciente_id']);
    }

    public function findTelefoneByPaciente($paciente_id)
    {
        return Telefone::where('paciente_id', $paciente_id)->get();


    }

    protected function _separarDddNumero($numero)
    {
        $array['ddd'] = substr($numero, 0, 4);
        $array['numero'] = substr($numero, 5);
        return $array;
    }

    public function destroy($id)
    {
        $telefone = Telefone::find($id);
        $telefone->delete();
        Session::flash('success', 'Excluído com sucesso!');
        return Redirect::back();
    }

}
