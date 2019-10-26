<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use App\Permission;
use App\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permission_nome = Route::getCurrentRoute()->getAction()['as'];
        
        $permission = Permission::with('roles')->where('nome', $permission_nome)->first();
        
        $user = auth()->user();
        
        if ($user->hasPermission($permission)) {         
            return $next($request);
        }
        
        return redirect('/home');
    }
}
