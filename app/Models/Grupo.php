<?php

namespace App\Models;

class Grupo extends AbstractModel
{
    const GP_TIPO_ATENDIMENTO = 1;
    const GP_GRUPO = 2;
    const GP_TEMPORARIO = 3;

    protected $fillable = ['tx_nome'];

    public function grupoItem()
    {
        return $this->hasMany('App\Models\GrupoItem', 'grupo_id')->orderBy('nu_ordem');
    }
}
