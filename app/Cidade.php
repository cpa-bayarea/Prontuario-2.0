<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cities';

    public function paciente(){

        return $this->belongsTo('App\Paciente');
    }

    public function uf(){

        return $this->hasOne('App\Uf','id','state_id');
    }
}
