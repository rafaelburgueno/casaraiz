<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Comentario;
use App\Mail\LoQuieroMailable;
use Illuminate\Support\Facades\Mail;

class LoQuieroController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //return request()->all();
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'id_producto' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'documento' => 'required|numeric',
            'telefono' => 'required|numeric',
            'medio_de_pago' => 'required',
        ]);

        $producto = Producto::find($request->id_producto);

        $solicitud = $request->nombre.' '.$request->apellido.' quiere el producto: ' . $producto->nombre . ' (id: ' . $producto->id . ')';

        Comentario::create([
            'texto' => $solicitud,
            'comentarioable_type' => 'Solicitud de producto',
        ]);
        
        $correo = new LoQuieroMailable($request->all(), $producto);
        
        // la direccion de email hay que cambiarla por casaraizuy@gmail.com al momento definalizar el proyecto
        //Mail::to('casaraizuy@gmail.com')->send($correo);
        Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->send($correo);
        
        //return $request->all();
        session()->flash('exito', 'El producto fue solicitado correctamente, en breve nos pondremos en contacto ;D');

        //return redirect() -> route('talleres');
        return back();
    }
}
