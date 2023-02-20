<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;
use App\Models\Multimedia;

class AgendaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //$eventos = Evento::all();
        //devuelve los eventos paginados
        // ...test/eventos?page=2
        //$eventos = Evento::orderBy('fecha','desc')->paginate();
        //obtiene los eventos mas recientes
        /*if(Auth::check() && Auth::user()->rol == 'administrador'){
            $eventos = Evento::where('frecuencia_semanal', '!=', 1)->orWhereNull('frecuencia_semanal')->where('fecha', '>', now())->where('es_extencion_del_evento_id', NULL)->orderBy('fecha')->paginate(10);
            //$eventos = Evento::orderBy('fecha')->get();

        }else{
            $eventos = Evento::where('frecuencia_semanal', '!=', 1)->orWhereNull('frecuencia_semanal')->where('fecha', '>', now())->where('es_extencion_del_evento_id', NULL)->where('activo', 1)->orderBy('fecha')->paginate(10);
        }*/

        $eventos = Evento::where('frecuencia_semanal', '!=', 1)->orWhereNull('frecuencia_semanal')->where('fecha', '>', now())->where('es_extencion_del_evento_id', NULL)->where('activo', 1)->orderBy('fecha')->get();
        //$eventos = Evento::where('frecuencia_semanal', '!=', 1)->orWhereNull('frecuencia_semanal')->where('es_extencion_del_evento_id', NULL)->where('activo', 1)->orderBy('fecha')->get();

        $banner = Multimedia::where('multimediaable_type', 'banner')->orderBy('relevancia','asc')->get();
        
        //session()->flash('exito', 'El AgendaController si funciona.');
        return view('agenda')->with('eventos', $eventos)->with('banner', $banner);
        //return view('agenda', compact('eventos'));
    }
}
