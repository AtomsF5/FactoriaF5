<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario autenticado es administrador, déjalo pasar, y si no, redirígelo a la ruta principal.
        if(Auth::check() && Auth::user()->is_admin==true)
            return $next($$request);

            //MODIFICAR RUTA PRINCIPAL (ruta de dashboard)
            return redirect('/');
    }
}
