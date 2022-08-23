<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColaboradorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && ( Auth::user()->rol == 'administrador' || Auth::user()->rol == 'colaborador' )){
            return $next($request);
        }
            
        session()->flash('no_permitido', 'Ha intentado acceder a un área restringida a los colaboradores del sitio.');
        
        return redirect() -> route('home');
    }
}
