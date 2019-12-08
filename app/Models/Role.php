<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = ['nome', 'descricao'];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'permission_roles');
    }
}
