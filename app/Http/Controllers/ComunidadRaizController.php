<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propuesta;

class ComunidadRaizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //$emprendimientos = Propuestas::where('tipo', 'ludoteca')->where('activo', true)->orderBy('nombre','desc')->get();
        $emprendimientos = Propuesta::where('publico', true)->orderBy('nombre_del_emprendimiento','desc')->get();

        return view('comunidad_raiz')->with('emprendimientos', $emprendimientos);
    
    }
}
