<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Inscripcion;

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
        //return request()->all();
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

        //$solicitud = $request->nombre.' '.$request->apellido.' solicita una membresía de tipo '.$request->tipo_de_membresia;
        //$solicitud += ''.$request->nombre.' ';
        
        $user = NULL;
        if(auth()){
            $user = auth()->id();
        }

        $membresia = NULL;
        if($request->tipo_de_membresia == 'semilla'){$membresia = 1;}
        if($request->tipo_de_membresia == 'raiz'){$membresia = 2;}
        if($request->tipo_de_membresia == 'arbol'){$membresia = 3;}

        $intereses = '';
        if($request->interes1){ $intereses .= $request->interes1 . ', ';}
        if($request->interes2){ $intereses .= $request->interes2 . ', ';}
        if($request->interes3){ $intereses .= $request->interes3 . ', ';}
        if($request->interes4){ $intereses .= $request->interes4 . ', ';}
        if($request->interes5){ $intereses .= $request->interes5 . ', ';}
        if($request->interes6){ $intereses .= $request->interes6 . ', ';}

        $recibir_novedades = false;
        if($request->recibir_novedades == '1'){$recibir_novedades = true;}

        Inscripcion::create([
            'user_id' => $user,
            'nombre' => $request->nombre.' '.$request->apellido,
            'correo' => $request->correo,
            'documento_de_identidad' => $request->documento,
            'telefono' => $request->telefono,
            'inscripcionable_id' => $membresia,
            'inscripcionable_type' => 'membresia',
            'medio_de_pago' => $request->medio_de_pago,
            'intereses' => $intereses,
            'comentario' => $request->comentario,
            'recibir_novedades' => $recibir_novedades,
        ]);


        //return 'hola membresia';

        $correo = new ContactoMailable($request->all());

        // la direccion de email hay que cambiarla por casaraizuy@gmail.com al momento definalizar el proyecto
        //Mail::to('casaraizuy@gmail.com')->send($correo);
        Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->send($correo);

        //return $request->all();
        session()->flash('exito', 'La solicitud de membresía fue enviada correctamente, en breve nos pondremos en contacto ;D');

        return redirect() -> route('comunidad_raiz');
    }
}
