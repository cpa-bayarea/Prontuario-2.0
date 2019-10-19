<?php

namespace App\Http\Controllers;

use App\Models\Cidade;

class CidadeController extends Controller
{
    public function findCidadeByUf($uf)
    {
        return Cidade::where('state_id', $uf)->get();
    }
}
