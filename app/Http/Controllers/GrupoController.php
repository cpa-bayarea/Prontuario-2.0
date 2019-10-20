<?php

namespace App\Http\Controllers;

use App\Models\GrupoItem;

class GrupoController extends AbstractController
{

    public function edit($id)
    {
        $id = base64_decode($id);

        $aDados = $this->_recuperarDados();
        $aGrupos = $this->_model->find($id);

        $grupoItems = GrupoItem::where('grupo_id', $aGrupos->id)->get();

        return view("{$this->_dirView}.formulario", compact(['aGrupos', 'grupoItems'],[$aGrupos, $grupoItems]));
    }

}
