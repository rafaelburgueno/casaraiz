<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('home');

        /*
        $eventos = Evento::where('fecha', '>', now())->where('activo', true)->where('tipo', '!=', 'taller')->orderBy('relevancia')->take(6)->get();
        $talleres = Evento::where('fecha', '>', now())->where('activo', true)->where('tipo', 'taller')->orderBy('relevancia')->take(6)->get();
        
        return view('home')->with('eventos', $eventos)->with('talleres', $talleres);
        */

    }
}
