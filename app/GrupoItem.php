<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tx_nome_item_grupo', 
        'tx_outro', 
        'grupo_id'
    ];
     /**
     * Relacionamento de GrupoItems com Grupo
     */
    public function grupo() {
        return $this->belongsTo('App\Grupo', 'grupo_id', 'id');
    }
}
