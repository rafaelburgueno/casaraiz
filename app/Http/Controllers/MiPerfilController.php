<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class MiPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mi_perfil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        /*if($usuario->id != auth()->id() ){
            session()->flash('Ouch!', 'Intentaste editar un perfil que no te pertenece?');
            return redirect() -> route('home');
        }*/
        //return $request->all();
        $request->validate([
            'nombre' => 'string|max:255',
            //'email' => 'string|email|max:255|unique:users',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'documento' => 'numeric|nullable',
            'fecha' => 'date|nullable',
            'telefono' => 'numeric|nullable',
            'password' => ['nullable','confirmed', Rules\Password::defaults()],
        ]);

        $nombre = $usuario->name;
        if($request->nombre){$nombre = $request->nombre;}

        // TODO: cuando no se modifica el correo, la validacion tiene un conflicto 
        //porque piensa que el correo que se quiere guardar yaesta siendo usado
        /*$correo = $usuario->email;
        if($request->correo){$correo = $request->correo;}*/

        $documento = NULL;
        if($request->documento){$documento = $request->documento;}

        $telefono = NULL;
        if($request->telefono){$telefono = $request->telefono;}

        $fecha = NULL;
        if($request->fecha){$fecha = $request->fecha;}


        //$usuario->rol = $request->rol;
        //$usuario -> save();
        $usuario->update([
            'name' => $nombre,
            //'email' => $correo,
            'documento_de_identidad' => $documento,
            'fecha_de_nacimiento' => $fecha,
            'telefono' => $telefono,
        ]);


        if($request->password && ($request->password == $request->password_confirmation)){
            //$password = Hash::make($request->password);
            $usuario->update([
            'password' => Hash::make($request->password),
            ]);
        }



        //return $request->all();
        //IMAGEN
        //se guarda en la carpeta storage/app/public/eventos/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/usuarios');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            $imagen_publica = false;
            if(isset($request->imagen_publica)){
                $imagen_publica = true;
            }

            /*$descripcion_img = $request->descripcion;
            if($request->descripcion_img){
                $descripcion_img = $request->descripcion_img;
            }*/

            Multimedia::create([
                'url' => $url,
                'descripcion' => $nombre,
                //'relevancia' => 1,
                //'imagen_con_info' => 0,
                //'resolucion' => 'TODO',
                //'tamaño' => 'TODO',
                'multimediaable_id' => auth()->id(),
                'multimediaable_type' => 'App\Models\User',
                'activo' => $imagen_publica,
            ]);

            //return 'se guardo todo';
        }else{
            if(auth()->user()->multimedias->last()){
                $imagen_publica = false;
                if(isset($request->imagen_publica)){
                    $imagen_publica = true;
                }
                auth()->user()->multimedias->last()->update(['activo' => $imagen_publica,]);
            }
        }



        session()->flash('exito', 'Su perfil fue editado.');

        //return redirect() -> route('usuarios.show', $usuario);
        return redirect() -> route('mi_perfil');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
