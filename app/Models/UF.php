<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UF extends Model
{
    protected $table = 'states';

    public function cidade()
    {
        return $this->belongsTo('App\Models\Cidade');
    }
}
