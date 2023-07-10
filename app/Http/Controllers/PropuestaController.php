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
        
        return view('propuestas.index', compact('propuestas'));

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
            'telefono' => 'nullable|min:8', 
            'redes_sociales' => 'nullable|max:100', 
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096|nullable', 
            'descripcion' => 'required|max:1000', 
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



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Propuesta $propuesta)
    {
        //return 'el propuesta a editar es '.$propuesta->nombre;
        return view('propuestas.edit', compact('propuesta'));
        //return view('propuestas.edit')->with('propuesta', $propuesta);
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Propuesta  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propuesta $propuesta)
    {
        //debe llamarse tienda porque es el nombre especificado en la ruta (php artisan route:list)
        //return $request->all();
        $request->validate([
            'nombre' => 'required|max:100',
            'nombre_del_emprendimiento' => 'max:100|nullable',
            'correo' => 'required|max:100',
            'telefono' => 'max:20|nullable',
            'redes_sociales' => 'max:100|nullable',
            'descripcion' => 'required|max:1000', 
            'forma_de_colaboracion' => 'max:150|nullable',
            'beneficio' => 'max:255|nullable',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        
        $propuesta->nombre = $request->nombre;
        $propuesta->nombre_del_emprendimiento = $request->nombre_del_emprendimiento;
        $propuesta->correo = $request->correo;
        $propuesta->telefono = $request->telefono;
        $propuesta->redes_sociales = $request->redes_sociales;
        $propuesta->descripcion = $request->descripcion;
        $propuesta->forma_de_colaboracion = $request->forma_de_colaboracion;
        $propuesta->beneficio = $request->beneficio;
        
        if($request->publico){
            $propuesta->publico = $request->publico;
        }else{
            $propuesta->publico = 0;
        }

        

        //return $propuesta;
        $propuesta -> save();
        
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/propuestas');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            //eliminamos la imagen anterior
            if($propuesta->imagen){
                //
                Storage::delete(str_replace('storage', 'public', $propuesta->imagen->url));
                $propuesta->imagen->delete();
            }

            Multimedia::create([
                'url' => $url,
                'descripcion' => $propuesta->nombre_del_emprendimiento,
                'multimediaable_id' => $propuesta->id,
                'multimediaable_type' => 'App\Models\Propuesta',
            ]);

            //return 'se guardo todo';
        }

        
        session()->flash('exito', 'La propuesta fue editada.');
        return redirect() -> route('propuestas.index');
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propuesta  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propuesta $propuesta)
    {
        if($propuesta->imagen){
            Storage::delete(str_replace('storage', 'public', $propuesta->imagen->url));
            $propuesta->imagen->delete();
        }

        $propuesta->delete();

        session()->flash('exito', 'La propuesta fue eliminada.');
        return redirect() -> route('propuestas.index');
    }





}
