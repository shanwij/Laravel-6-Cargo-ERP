<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessResources
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
        
        if(Auth::user()->hasAnyRole('resources')){
            return $next($request);
        }
        
        /*
        if(Auth::user()->hasAnyRoles(['manager', 'operations'])){
            return $next($request);
        }
        */
        
        
        return redirect('home'); 
    }
}
