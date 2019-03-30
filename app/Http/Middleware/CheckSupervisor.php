<?php

namespace App\Http\Middleware;

use Closure;

class CheckSupervisor
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
          if ( !auth()->check() )
          {
               return redirect()->route('login');
              
          }

        if( auth()->user()->roles[0]->id != 2 ){
            
            return redirect('/home');
            
        }
        
        return $next($request);
    }
}
