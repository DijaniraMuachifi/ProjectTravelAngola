<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::user() && Auth::user()->isAdmin)
            return $next($request);
        else{
            alert('Autorização','Acesso Negado','error');
            return redirect()->back();
        }
     
   
    }
}
