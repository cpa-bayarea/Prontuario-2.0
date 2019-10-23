<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrupoController extends AbstractController
{

    /**
     * Salva/Altera um pedido e retorna para a mesma página.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($id = base64_decode($request->id)) {
            $this->_model = $this->_model->find($id);
        }
        $this->_model->fill($request->toArray());
        $this->_model->save();

        return redirect()->route('grupos.edit', base64_encode($this->_model->id));
    }
}
