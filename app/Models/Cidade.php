<?php

namespace App\Models;

class Cidade extends AbstractModel
{
//    protected $table = 'cidades';

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente');
    }

    public function uf()
    {
        return $this->hasOne('App\Models\Uf', 'id', 'estado_id');
    }
}
