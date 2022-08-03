<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class TalleresController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        //$talleres = Evento::where('fecha', '>', now())->where('activo', true)->orderBy('fecha','asc')->paginate();
        //$talleres = Evento::where('tipo', 'taller')->where('recurrente', true)->where('activo', true)->orderBy('relevancia','asc')->paginate();
        $talleres = Evento::where('tipo', 'taller')->where('activo', true)->orderBy('relevancia','asc')->paginate();


        //return $talleres;
        return view('talleres', compact('talleres'));

    }
}
