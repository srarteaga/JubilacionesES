<?php

namespace App\Http\Middleware;

use Closure;

class middlewareSesion
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
        if(isset($_SESSION['nombre']))
        {
            $segundos = time();
            $tiempo_transcurrido = $segundos;
            $tiempo_maximo = $_SESSION['inicio']  + ( $_SESSION['intervalo'] * 60 ); 
            if($tiempo_transcurrido > $tiempo_maximo){
                return redirect('/home');
            }else{
                $_SESSION['inicio'] = time();
                return $next($request); 
            }

        
        }

        else
        {
            return redirect('/');
        }

    }
}
