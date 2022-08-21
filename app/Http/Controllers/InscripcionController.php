<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InscripcionMailable;
use App\Models\Comentario;
use App\Models\Evento;

class InscripcionController extends Controller
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
            'id_evento' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email',
            'documento' => 'required|numeric',
            'telefono' => 'required|numeric',
            'medio_de_pago' => 'required',
        ]);

        $evento = Evento::find($request->id_evento);

        $solicitud = $request->nombre.' '.$request->apellido.' solicita inscribirse al ' . $evento->tipo . ': ' . $evento->nombre;

        Comentario::create([
            'texto' => $solicitud,
            'comentarioable_type' => 'Inscripción',
        ]);
        
        $correo = new InscripcionMailable($request->all(), $evento);
        
        // la direccion de email hay que cambiarla por casaraizuy@gmail.com al momento definalizar el proyecto
        //Mail::to('casaraizuy@gmail.com')->send($correo);
        Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->send($correo);
        
        //return $request->all();
        session()->flash('exito', 'La solicitud de inscripcion fue enviada correctamente, en breve nos pondremos en contacto ;D');

        //return redirect() -> route('talleres');
        return back();
    }
}
