<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoItem extends Model
{
    protected $fillable = ['nome','grupo_id','ordem','outro'];

    public function grupo(){
        return $this->belongsTo('App\Grupo','id','grupo_id');
    }
}
