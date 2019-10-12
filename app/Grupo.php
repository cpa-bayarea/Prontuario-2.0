<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
        protected $fillable = ['nome'];

    public function grupoItem(){
        return $this->hasMany('App\GrupoItem','grupo_id');
    }
}
