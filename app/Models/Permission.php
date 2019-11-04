<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = ['nome', 'descricao'];

    public function roles(){
        
        return $this->belongsToMany('App\Role','permission_roles');
        
    }
}
