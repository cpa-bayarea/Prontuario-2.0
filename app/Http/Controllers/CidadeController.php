<?php

namespace App\Http\Controllers;

use App\Models\City;

class CidadeController extends Controller {


    public function findCidadeByUf($uf){

        return City::where('state_id', $uf)->get();

    }

}
