<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RespostasTriagem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id_triagem', 
        'id_grupo'
    ];

    //  /**
    //  * Relacionamento de RespostasTriagem com triagem
    //  */
    // public function respostaTriagem(){
    //     return $this->hasMany('App\Triagem','id', 'id_grupo');
    // }

}
