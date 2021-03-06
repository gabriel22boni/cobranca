<?php

namespace App\Http\Middleware;

use Closure;

class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if ( 
            auth()->user()->nivel != "CEO"
            && auth()->user()->nivel != "MAS"
            && auth()->user()->nivel != "ADM"

        ){return redirect('painel/dashboard');}

        return $next($request);
    }
}
