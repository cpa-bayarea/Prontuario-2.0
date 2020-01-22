<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';

    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente');
    }

    public function uf()
    {
        return $this->hasOne('App\Models\Uf', 'id', 'estado_id');
    }
}
