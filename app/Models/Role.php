<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['nome','descricao'];

    public function permissions(){
        
        return $this->belongsToMany('App\Permission','permission_roles');
        
    }
}
