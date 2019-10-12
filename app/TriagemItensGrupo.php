<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TriagemItensGrupo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'outro',
    ];
    public function triagemItensGrupo(){
        return $this->belongsTo('App\Triagem');
    }
}
