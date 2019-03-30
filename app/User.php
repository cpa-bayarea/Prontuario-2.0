<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    
    
     public function roles(){
        
        return $this->belongsToMany('App\Role','role_users');
        
    }
    
    
     public function hasPermission(Permission $permission)
    {  
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
