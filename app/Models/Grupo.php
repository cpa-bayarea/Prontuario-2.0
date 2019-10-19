<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nome'];

    public function grupoItem(){
        return $this->hasMany('App\Models\GrupoItem','grupo_id');
    }
}
