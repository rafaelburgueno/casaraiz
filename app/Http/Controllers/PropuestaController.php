<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propuesta;
// use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

use Illuminate\Support\Facades\Mail;
use App\Mail\PropuestaMailable; 


class PropuestaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propuestas = Propuesta::get();
        
        return view('propuestas', compact('propuestas'));

    }






    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return request()->all();
        // Validaciones
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre' => 'required|max:100', 
            'nombre_del_emprendimiento' => 'required|max:100',
            'correo' => 'required|email', 
            'telefono' => 'required|numeric', 
            'redes_sociales' => 'max:100', 
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096|nullable', // TODO: guardar la imagen // multimedia
            'descripcion' => 'required|max:255', // TODO: no estoy seguro del max:255
            'forma_de_colaboracion' => 'nullable|max:150',
        ]);

        // se crea usuario y se almacena en la BD
        $propuesta = Propuesta::create([
            'nombre' => $request->nombre,
            'nombre_del_emprendimiento' => $request->nombre_del_emprendimiento,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'redes_sociales' => $request->redes_sociales,
            'descripcion' => $request->descripcion,
        ]);

        //si llega forma_de_colaboracion en la $request, se guarda en la BD
        if($request->forma_de_colaboracion){
            $propuesta->forma_de_colaboracion = $request->forma_de_colaboracion;
            $propuesta->save();
        }


        //IMAGEN
        //se guarda en la carpeta storage/app/public/usuarios/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/propuestas');
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $propuesta->nombre_del_emprendimiento,
                'multimediaable_id' => $propuesta->id,
                'multimediaable_type' => 'App\Models\Propuesta',
            ]);

        }


        // TODO: envio de email con la propuesta
        $correo = new PropuestaMailable($propuesta);
        Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->send($correo);


        session()->flash('exito', 'La propuesta fue enviada correctamente, en breve nos pondremos en contacto ;D');
        //return $request->all();
        return redirect() -> route('comunidad_raiz');
    }
}
