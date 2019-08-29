<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\GrupoItemsHasTriagem;

class GrupoItemsHasTriagem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id_triagem', 
        'id_grupo_item'
    ];
    // /**
    //  * Relacionamento das RespostasTriagem com triagem
    //  */
    // public function triagem() {
    //     return $this->hasMany('App\GrupoItemsHasTriagem','id_triagem');
    // }
    // /**
    //  * Relacionamento das RespostasTriagem com Grupo
    //  */
    // public function resposta_triagem() {
    //     return $this->hasMany('App\GrupoItem','id_grupo_item');
    // }
}
