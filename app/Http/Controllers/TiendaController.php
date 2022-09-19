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
        //$productos = Producto::where('activo', true)->orderBy('nombre','desc')->paginate(12);
        //$productos = Producto::where('activo', true)->orderBy('created_at','desc')->get();
        $productos = Producto::where('tipo', 'tienda')->where('activo', true)->orderBy('nombre','desc')->get();
        $almacen_de_semillas = Producto::where('tipo', 'almacen de semillas')->where('activo', true)->orderBy('nombre','desc')->get();
        $biblioteca = Producto::where('tipo', 'biblioteca')->where('activo', true)->orderBy('nombre','desc')->get();
        $ludoteca = Producto::where('tipo', 'ludoteca')->where('activo', true)->orderBy('nombre','desc')->get();

        return view('tienda')->with('productos', $productos)->with('almacen_de_semillas', $almacen_de_semillas)->with('biblioteca', $biblioteca)->with('ludoteca', $ludoteca);
    }
}
