<?php

namespace App\Http\Controllers;

use App\Models\LinhaTeorica;

class SupervisorController extends AbstractController
{

    public function create()
    {
        $aDados = $this->_recuperarDados();
        $aDados['model'] = $this->_model;
        $aDados['linhas'] = LinhaTeorica::all()->sortBy('tx_nome');

        return view("{$this->_dirView}.formulario", $aDados);
    }

    public function edit($id)
    {
        $aDados = $this->_recuperarDados();
        $aDados['model'] = $this->_model->find(base64_decode($id));
        $aDados['linhas'] = LinhaTeorica::all()->sortBy('tx_nome');

        return view("{$this->_dirView}.formulario", $aDados);
    }
}
