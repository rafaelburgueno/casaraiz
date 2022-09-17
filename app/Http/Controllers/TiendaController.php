<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class TiendaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //a los usuarios normales se le mostraran solo los posts publicados
        $productos = Producto::where('activo', true)->orderBy('nombre','desc')->paginate(12);
        //$productos = Producto::where('activo', true)->orderBy('created_at','desc')->get();
        
        return view('tienda', compact('productos'));
    }
}
