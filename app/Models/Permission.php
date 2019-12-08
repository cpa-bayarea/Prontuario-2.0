<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = ['nome', 'descricao'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'permission_roles');
    }
}
