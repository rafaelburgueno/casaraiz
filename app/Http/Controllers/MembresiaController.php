<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Comentario;

class MembresiaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'correo' => 'required|email',
            'documento' => 'required|numeric',
            'telefono' => 'required|numeric',
            'tipo_de_membresia' => 'required',
            //'fecha' => 'required',
            'comentario' => 'max:255',
        ]);

        $solicitud = $request->nombre.' '.$request->apellido.' solicita una membresía de tipo '.$request->tipo_de_membresia;
        //$solicitud += ''.$request->nombre.' ';

        Comentario::create([
            'texto' => $solicitud,
            'comentarioable_type' => 'petición de membresía',
        ]);


        //return 'hola membresia';

        $correo = new ContactoMailable($request->all());

        // la direccion de email hay que cambiarla por casaraizuy@gmail.com al momento definalizar el proyecto
        //Mail::to('casaraizuy@gmail.com')->send($correo);
        Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->send($correo);

        //return $request->all();
        session()->flash('exito', 'La solicitud de membresia fue enviada correctamente, en breve nos pondremos en contacto ;D');

        return redirect() -> route('comunidad_raiz');
    }
}
