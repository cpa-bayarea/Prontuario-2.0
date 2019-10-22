<?php

namespace App\Http\Controllers;

use App\Models\GrupoItem;
use Illuminate\Http\Request;

class GrupoItemController extends AbstractController
{

    public function getById(Request $request)
    {
        if (key_exists('grupo_id', ($request->all()))) {
            $id = base64_decode($request->grupo_id);
            $return = GrupoItem::where('grupo_id', $id)->get();

        } else {
            $return = null;
        }

        return $return;
    }

    public function store(Request $request)
    {
        if ($id = base64_decode($request->id)) {
            $this->_model = $this->_model->find($id);
        }
        $grupo_id = base64_decode($request->grupo_id);

        $this->_model::create([
            'grupo_id'  => $grupo_id,
            'tx_nome'   => $request->tx_nome,
            'nu_ordem'  => $request->nu_ordem,
            'tx_outro'  => $request->tx_outro,
        ]);
        $this->_model->save();
        return response()->json(['success' => 'mensagem', 'Operação realizada com sucesso!']);
    }
}
