<?php

namespace App\Http\Middleware;

use Closure;

class JefeEscuela
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
        //dd($request->user()->tipoUsuario());
        switch ($request->user()->tipoUsuario()){
            case 1:
                return $next($request);
            break;
            
        default :
            abort(401);
        }
        
        
    }
}
