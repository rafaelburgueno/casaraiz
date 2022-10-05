<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Multimedia;

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
        //return view('home');

        // Consulta a la base de datos para traer los elementos (imágenes) que se muestran en el banner.
        $banner = Multimedia::where('multimediaable_type', 'banner')->where('activo', true)->orderBy('relevancia','asc')->get();
        
        //$eventos = Evento::where('fecha', '>', now())->where('activo', true)->where('tipo', '!=', 'taller')->orderBy('relevancia')->take(6)->get();
        //$talleres = Evento::where('fecha', '>', now())->where('activo', true)->where('tipo', 'taller')->orderBy('relevancia')->take(6)->get();
        
        // Retorna la vista y los datos del banner dentro del array $banner.
        return view('home')->with('banner', $banner);
        
        //return view('home')->with('eventos', $eventos)->with('talleres', $talleres)->with('banner', $banner);

    }
}
