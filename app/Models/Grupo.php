<?php

namespace App\Models;

class Grupo extends AbstractModel
{
    protected $fillable = ['tx_nome'];

    public function grupoItem(){
        return $this->hasMany('App\Models\GrupoItem','grupo_id');
    }
}
