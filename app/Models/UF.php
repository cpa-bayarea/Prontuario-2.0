<?php

namespace App\Models;

class UF extends AbstractModel
{
    protected $table = 'estados';

    public function cidade()
    {
        return $this->belongsTo('App\Models\Cidade');
    }
}
