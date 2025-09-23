<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if(Auth::user() && Auth::user()->isCliente)
            return $next($request);
        else{
            alert('Autorização','Acesso Negado/criar uma conta cliente','error');
            return redirect()->back();
        }
    }
}
