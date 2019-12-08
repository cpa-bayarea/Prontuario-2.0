<?php

namespace App\Models;

class TriagemItensGrupo extends AbstractModel
{
    protected $fillable = ['outro'];

    public function triagemItensGrupo()
    {
        return $this->belongsTo('App\Models\Triagem');
    }
}
