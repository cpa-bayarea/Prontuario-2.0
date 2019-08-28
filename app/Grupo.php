<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tx_nome_grupo', 
    ];
    /**
     * Relacionamento de Grupo com GrupoItems
     */
    public function stores(){
        return $this->hasMany('App\GrupoItem','id', 'id_grupo');
    }
}
