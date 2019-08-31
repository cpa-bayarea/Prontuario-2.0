<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function index($paciente_id){
        return Telefone::where('paciente_id',$paciente_id)->get();
    }

    public function store(array $aTelefone){

        if(isset($aTelefone['id'])){
            $telefone = Telefone::find($aTelefone['id']);
        }else{
            $telefone = new Telefone();
        }

        $dataTelefone = $this->_separarDddNumero( $aTelefone['telefone'] );
        $dataTelefone['paciente_id'] = $aTelefone['paciente_id'];
        $telefone->fill($dataTelefone);
        $telefone->save();

        return true;
    }

    protected function _separarDddNumero($numero){
        $array['ddd'] = substr($numero,0,4);
        $array['numero'] =  substr($numero,5);
        return $array;
    }

    public function destroy($id){
        $telefone = Telefone::find($id);
        $telefone->destroy();
    }

}
