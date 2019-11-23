<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoItem extends Model
{
    protected $fillable = ['tx_nome', 'nu_ordem', 'tx_outro', 'grupo_id'];

    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }
}
