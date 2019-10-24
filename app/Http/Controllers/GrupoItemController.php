<?php

namespace App\Http\Controllers;

use App\Models\GrupoItem;
use Illuminate\Http\Request;

class GrupoItemController extends AbstractController
{

    public function edit($id)
    {
        $aDados = $this->_recuperarDados();
        $aDados = $this->_model->find(base64_decode($id));
        $aDados->grupo_id = base64_encode($aDados->grupo_id);

        $response = [
            "type" => "success",
            "data" => $aDados
        ];

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
        if ($id = $request->id) {
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

    public function destroy($id)
    {
        $this->_model = $this->_model->find(base64_decode($id));
        $this->_model->delete();
        return base64_encode($this->_model->grupo_id);
    }
}
