<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

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
        //$talleres = Evento::where('tipo', 'taller')->where('activo', true)->orderBy('relevancia','asc')->paginate();

        if(Auth::check() && Auth::user()->rol == 'administrador'){
            //al administrador se le mostraran todos los posts
            $talleres = Evento::where('tipo', 'taller')->where('es_extencion_del_evento_id', NULL)->orderBy('relevancia','asc')->paginate();

        }else{
            //a los usuarios normales se le mostraran solo los posts publicados
            $talleres = Evento::where('tipo', 'taller')->where('es_extencion_del_evento_id', NULL)->where('activo', true)->orderBy('relevancia','asc')->paginate();

        }

        //return $talleres;
        return view('talleres', compact('talleres'));

    }
}
