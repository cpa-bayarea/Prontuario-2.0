<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles(){
        
        return $this->belongsToMany('App\Role','role_users');
        
    }
    
    
     public function hasPermission(Permission $permission)
    {
        if (Auth::user()->hasAnyRoles('SuperAdmin')) {
            return true;
        }
        return $this->hasAnyRoles($permission->roles);
    }
    
    public function hasAnyRoles($roles)
    {   
        
        

        if(is_array($roles) || is_object($roles) ) {            
            return !! $roles->intersect($this->roles)->count();            
        }              
        return $this->roles->contains('nome', $roles);
    }
}
