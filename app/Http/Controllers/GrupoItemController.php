<?php

namespace App\Http\Controllers;

use App\Models\GrupoItem;
use Illuminate\Http\Request;

class GrupoItemController extends AbstractController
{

    public function edit($id)
    {
        $aDados = $this->_recuperarDados();
        $aDados = $this->_model->find($id);

        if (!empty($aDados)) {
            $response = [
                "type" => "success",
                "data" => $aDados
            ];
        } else {
            $response = [
                "type" => "error",
                "data" => "Registro não existente!"
            ];
        }

        return $response;
    }

    /**
     * Carrega listagem da tela de ordemItems.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getById($id)
    {
        $aGrupoItem = GrupoItem::where('grupo_id', base64_decode($id))->orderBy('nu_ordem')->get();
        return view('grupoitem.index', compact('aGrupoItem'));
    }

    public function store(Request $request)
    {
        if ($id = base64_decode($request->id)) {
            $this->_model = $this->_model->find($id);
        }
        $grupo_id = base64_decode($request->grupo_id);

        $this->_model->grupo_id = $grupo_id;
        $this->_model->tx_nome  = $request->tx_nome;
        $this->_model->nu_ordem = $request->nu_ordem;
        $this->_model->tx_outro = $request->tx_outro;
        $this->_model->save();
        return response()->json(['success' => 'mensagem', 'Operação realizada com sucesso!']);
    }
}
