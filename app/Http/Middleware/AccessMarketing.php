<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessMarketing
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
        
        if(Auth::user()->hasAnyRole('marketing')){
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
