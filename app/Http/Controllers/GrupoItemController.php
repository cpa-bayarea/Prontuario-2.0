<?php

namespace App\Http\Controllers;

use App\Models\GrupoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GrupoItemController extends AbstractController
{

    public function getById(Request $request)
    {
        if (key_exists('grupo_id', ($request->all()))) {
            $id = $request->grupo_id;
            $return = GrupoItem::where('grupo_id', $id)->get();

        } else {
            $return = null;
        }

        return $return;
    }
}
