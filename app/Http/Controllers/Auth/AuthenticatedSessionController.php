<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        
        $request->session()->regenerate();
        //dd($request->session()->regenerate());
        //dd($request->user()->hasVerifiedEmail());

        /*if (!$request->user()->hasVerifiedEmail()) {

            //$request->user()->sendEmailVerificationNotification();
            
            //estas tres lineas cierran la sesion si no esta el emailverificado 
            //(son las miesmas que hay en el metodo destroy())
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            //return redirect() -> route('home');

            //return back()->with('status', 'verification-link-sent');
            session()->flash('no_permitido', 'Debes confirmar el email para iniciar sesión.');

        }*/

        
        //cuando se loguea se redirige al home
        return redirect() -> route('home');

        //return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
