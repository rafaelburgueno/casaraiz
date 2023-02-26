<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Mail;
// use App\Mail\InscripcionMailable; TODO: enviar un email para avisar de las propuestas

class PropuestaController extends Controller
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
        // Validaciones
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre_del_emprendimiento' => 'required|max:100',
            'nombre' => 'required|max:100', //users
            'correo' => 'required|email', //users
            'telefono' => 'required|numeric', //users
            'redes_sociales' => 'max:100', 
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096|nullable', // multimedia
            'descripcion' => 'required|max:255', // TODO: no estoy seguro del max:255
        ]);

        // se crea usuario y se almacena en la BD
        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'rol' => 'emprendedor',
            'telefono' => $request->telefono,
            'activo' => false,
            //'password' => Crypt::encryptString('123456789'),
            'password' => bcrypt($request->correo),
        ]);

        // se crea el objeto Inscripcion y se almacena en la BD
        Comentario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'user_id' => $user->id,
            //'comentarioable_id' => $membresia,
            'comentarioable_type' => 'propuesta',
            'texto' => $request->nombre_del_emprendimiento . ': ' . $request->descripcion,
        ]);



        // TODO: envio de email con la propuesta
        //$correo = new ContactoMailable($request->all());
        // la direccion de email hay que cambiarla por casaraizuy@gmail.com al momento definalizar el proyecto
        //Mail::to('casaraizuy@gmail.com')->send($correo);
        //Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->send($correo);

        //return $request->all();
        session()->flash('exito', 'La propuesta fue enviada correctamente, en breve nos pondremos en contacto ;D');

        return redirect() -> route('home');
    }
}
