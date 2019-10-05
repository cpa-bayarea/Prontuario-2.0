<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UF;
use App\Cidade;

class CidadeController extends Controller {


    public function findCidadeByUf($uf){

        return Cidade::where('state_id', $uf)->get();

    }

}
