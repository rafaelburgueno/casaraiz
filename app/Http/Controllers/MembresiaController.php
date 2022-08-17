<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

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
        //return 'hola membresia';

        $correo = new ContactoMailable($request->all());

        // la direccion de email hay que cambiarla por casaraizuy@gmail.com al momento definalizar el proyecto
        //Mail::to('casaraizuy@gmail.com')->send($correo);
        Mail::to('rafaelburg@gmail.com')->send($correo);

        //return $request->all();
        session()->flash('exito', 'La solicitud de membresia fue enviada correctamente, en breve nos pondremos en contacto ;D');

        return redirect() -> route('comunidad_raiz');
    }
}
