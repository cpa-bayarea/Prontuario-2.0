<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;zssad
    protected $fillable = [
        'tx_nome_grupo', 
    ];

    public function topicos_pergumtas(){
        return $this->hasMany('App\GrupoItem');
    }
}
