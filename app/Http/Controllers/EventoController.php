<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class EventoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::where('es_extencion_del_evento_id', NULL)->orderBy('activo','desc')->orderBy('fecha')->paginate();
        //$eventos = Evento::all();
        //devuelve los eventos paginados
        // ...test/eventos?page=2
        //$eventos = Evento::orderBy('fecha','desc')->paginate();
        //obtiene los eventos mas recientes
        /*if(Auth::check() && Auth::user()->rol == 'administrador'){
            $eventos = Evento::where('frecuencia_semanal', '!=', 1)->orWhereNull('frecuencia_semanal')->where('fecha', '>', now())->orderBy('fecha')->paginate();
            //$eventos = Evento::orderBy('fecha')->get();

        }else{
            $eventos = Evento::where('frecuencia_semanal', '!=', 1)->orWhereNull('frecuencia_semanal')->where('fecha', '>', now())->where('activo', 1)->orderBy('fecha')->paginate();
        }*/
        
        return view('eventos.index', compact('eventos'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventos.create');
    }



     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreEvento $request)
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre' => 'required|unique:eventos|max:255',
            'tipo' => 'required|max:25',
            'responsable' => 'required|max:100',
            'descripcion' => 'required|max:255',
            'lugar' => 'max:100',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg',
            //'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'descripcion_img' => 'max:255',
        ]);
        
        $evento = new Evento();

        $evento->slug = strtolower(Str::slug($request->nombre, '-'));// los eventos se identifican con este campo, por eso sustituimos los espacios y lo pasamos a minusculas
        $evento->nombre = $request->nombre;
        $evento->tipo = strtolower($request->tipo); // algunas busquedas se hacen usando este campo, por eso lo pasamos a minusculas
        $evento->relevancia = $request->relevancia;

        // auth()->user()->id
        // auth()->id();
        $evento->user_id = auth()->id(); //registra al usuario que crea el evento
        $evento->responsable = $request->responsable;
        $evento->descripcion = $request->descripcion;
        //$evento->categoria = $request->categoria; //TODO: resolver la asignacion de categorias
        $evento->lugar = $request->lugar;

        $evento->frecuencia_semanal = $request->frecuencia_semanal;
        $evento->frecuencia_mensual = $request->frecuencia_mensual;
        $evento->frecuencia_anual = $request->frecuencia_anual;

        if($request->fecha){
            $evento->fecha = $request->fecha;
            $evento->anio = substr($request->fecha, 0, 4);
            $numero_de_mes = substr($request->fecha, 5, -3);
            $evento->mes = EventoController::nombre_mes($numero_de_mes);
            $evento->dia = substr($request->fecha, -2);
        }

        $evento->dia_de_semana = $request->dia_de_semana;

        $evento->hora_de_inicio = $request->hora_de_inicio;
        $evento->hora_de_fin = $request->hora_de_fin;
        $evento->cupos_totales = $request->cupos_totales;
        $evento->cupos_disponibles = $request->cupos_totales;

        $evento->costo_de_inscripcion = $request->costo_de_inscripcion;

        if($request->activo){
            $evento->activo = true;
        }else{
            $evento->activo = false;
        }

        $evento -> save();


        if($request->hora_de_inicio_2 && $request->hora_de_fin_2){
            EventoController::extender_evento($request->nombre, $request->dia_de_semana_2, $request->hora_de_inicio_2, $request->hora_de_fin_2, $evento->id);

            if($request->hora_de_inicio_3 && $request->hora_de_fin_3){
                EventoController::extender_evento($request->nombre, $request->dia_de_semana_3, $request->hora_de_inicio_3, $request->hora_de_fin_3, $evento->id);

                if($request->hora_de_inicio_4 && $request->hora_de_fin_4){
                    EventoController::extender_evento($request->nombre, $request->dia_de_semana_4, $request->hora_de_inicio_4, $request->hora_de_fin_4, $evento->id);
                }
            }

            $evento->update(['tiene_extenciones' => 1]);

        }

        //return $request->all();
        //IMAGEN
        //se guarda en la carpeta storage/app/public/eventos/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/eventos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            $imagen_con_info = false;
            if($request->imagen_con_info){
                $imagen_con_info = true;
            }

            $descripcion_img = $request->descripcion;
            if($request->descripcion_img){
                $descripcion_img = $request->descripcion_img;
            }

            Multimedia::create([
                'url' => $url,
                'descripcion' => $descripcion_img,
                'relevancia' => 1,
                'imagen_con_info' => $imagen_con_info,
                'resolucion' => 'TODO',
                'tamaño' => 'TODO',
                'multimediaable_id' => $evento->id,
                'multimediaable_type' => 'App\Models\Evento',
            ]);

            //return 'se guardo todo';
        }


        //$evento = Evento::create($request->all());

        session()->flash('exito', 'El evento fue creado.');

        return redirect() -> route('eventos.index');
        //return redirect() -> route('talleres');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    public function show(Evento $evento)
    {
        //$evento = Evento::findOrFail($id);
        return view('eventos.show', compact('evento'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    public function edit(Evento $evento)
    {
        //$evento = Evento::findOrFail($id);
        return view('eventos.edit', compact('evento'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(Request $request, Evento $evento)
    {
        //return $request->all();
        $request->validate([
            'nombre' => 'required|max:255',
            'tipo' => 'required|max:25',
            'responsable' => 'required|max:100',
            'descripcion' => 'required|max:255',
            'lugar' => 'max:100',
            //'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        //return $request->all();
        /*$fecha = $request->fecha;
        $anio = $fecha->format('Y');
        $mes = $fecha->format('m');
        $dia = $fecha->format('d');*/

        //TODO actualizar el campo slug
        //$evento = Evento::findOrFail($id);
        $evento->slug = strtolower(str_replace(' ', '-', $request->nombre));
        $evento->nombre = $request->nombre;
        $evento->tipo = strtolower($request->tipo);
        $evento->relevancia = $request->relevancia;
        $evento->user_id = auth()->id(); //registra al usuario que adita el evento

        $evento->responsable = $request->responsable;
        $evento->descripcion = $request->descripcion;
        //$evento->categoria = $request->categoria; //TODO: resolver la asignacion de categorias
        $evento->lugar = $request->lugar;

        $evento->frecuencia_semanal = $request->frecuencia_semanal;
        $evento->frecuencia_mensual = $request->frecuencia_mensual;
        $evento->frecuencia_anual = $request->frecuencia_anual;

        if($request->fecha){
            $evento->fecha = $request->fecha;
            $evento->anio = substr($request->fecha, 0, 4);
            $numero_de_mes = substr($request->fecha, 5, -3);
            $evento->mes = EventoController::nombre_mes($numero_de_mes);
            $evento->dia = substr($request->fecha, -2);
        }
        
        $evento->dia_de_semana = $request->dia_de_semana;

        $evento->hora_de_inicio = $request->hora_de_inicio;
        $evento->hora_de_fin = $request->hora_de_fin;
        $evento->cupos_totales = $request->cupos_totales;
        
        $evento->costo_de_inscripcion = $request->costo_de_inscripcion;

        if($request->activo){
            $evento->activo = true;
        }else{
            $evento->activo = false;
        }
        
        $imagen_con_info = false;
        if($request->imagen_con_info){
            $imagen_con_info = true;
        }
        
        if($request->file('imagen')){
            $files = $request->file('imagen');

            foreach($files as $key=>$file){

                //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
                $imagen = $file->store('public/eventos');
                //$imagen = $request->file('imagen')-> store('public/eventos');
                
                //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
                $url = Storage::url($imagen);

                Multimedia::create([
                    'url' => $url,
                    'descripcion' => $request->nombre,
                    'relevancia' => ++$key,
                    'imagen_con_info' => $imagen_con_info,
                    'resolucion' => 'TODO',
                    'tamaño' => 'TODO',
                    'multimediaable_id' => $evento->id,
                    'multimediaable_type' => 'App\Models\Evento',
                ]);

            }

        }else{
            
            if(count( $evento->multimedias )){
                $evento->multimedias->last()->imagen_con_info = $imagen_con_info;
                $evento->multimedias->last()->save();
            }
        }

        $evento -> save();


        // horarios adicionales
        if($request->hora_de_inicio_2 && $request->hora_de_fin_2){
            if($request->id_extension_2){
                $activar_dia = false;
                if($request->activar_dia_2){ $activar_dia = true;}
                EventoController::extender_evento_update($request->nombre, $request->dia_de_semana_2, $request->hora_de_inicio_2, $request->hora_de_fin_2, $request->id_extension_2, $activar_dia);
            }else{
                EventoController::extender_evento($request->nombre, $request->dia_de_semana_2, $request->hora_de_inicio_2, $request->hora_de_fin_2, $evento->id);
            }

            if($request->hora_de_inicio_3 && $request->hora_de_fin_3){
                if($request->id_extension_3){
                    $activar_dia = false;
                    if($request->activar_dia_3){ $activar_dia = true;}
                    EventoController::extender_evento_update($request->nombre, $request->dia_de_semana_3, $request->hora_de_inicio_3, $request->hora_de_fin_3, $request->id_extension_3, $activar_dia);
                }else{
                    EventoController::extender_evento($request->nombre, $request->dia_de_semana_3, $request->hora_de_inicio_3, $request->hora_de_fin_3, $evento->id);
                }

                
                if($request->hora_de_inicio_4 && $request->hora_de_fin_4){
                    if($request->id_extension_4){
                        $activar_dia = false;
                        if($request->activar_dia_4){ $activar_dia = true;}
                        EventoController::extender_evento_update($request->nombre, $request->dia_de_semana_4, $request->hora_de_inicio_4, $request->hora_de_fin_4, $request->id_extension_4, $activar_dia);
                    }else{
                        EventoController::extender_evento($request->nombre, $request->dia_de_semana_4, $request->hora_de_inicio_4, $request->hora_de_fin_4, $evento->id);
                    }
                }
                
            }

            $evento->update(['tiene_extenciones' => 1]);

        }


        session()->flash('exito', 'El evento fue editado.');

        return redirect() -> route('eventos.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {

        // buscamos todos los registros multimedia asociados al evento
        // Multimedia::where('multimediaable_type', 'App\Models\Evento')->where('multimediaable_id', $producto->id)->delete();
        $multimedias = Multimedia::where('multimediaable_type', 'App\Models\Evento')->where('multimediaable_id', $evento->id)->get();
        
        foreach($multimedias as $multimedia ) {
            //se cambia la url relativa por la url del directorio
            $url = str_replace('storage', 'public', $multimedia->url);
            
            // elimina de la carpeta
            Storage::delete($url);

            // Se eliminan de la base de datos las imagenes relacionadas al producto
            $multimedia->delete();
        }

        // si tiene horarios adicionales nos elimina
        if($evento->tiene_extenciones){
            $horarios_adicionales = $evento->horarios_adicionales();
            foreach ($horarios_adicionales as $horario){ 
                $horario->delete();
                }
        }
        $evento->delete();
        session()->flash('exito', 'El evento fue eliminado.');
        
        /*$evento->activo = 0;
        $evento -> save();
        session()->flash('exito', 'El evento fue desactivado.');*/


        return redirect() -> route('eventos.index');
    }



    //funcion para agregar dia y hora adicionales a un evento
    public function extender_evento($nombre, $dia_de_semana, $hora_de_inicio, $hora_de_fin, $evento_id){
        
        $extension_de_evento = new Evento();

        $extension_de_evento->slug = 'Extensión|' . strtolower(Str::slug($nombre, '-'));// los eventos se identifican con este campo, por eso sustituimos los espacios y lo pasamos a minusculas
        $extension_de_evento->nombre = 'Extensión | ' .$nombre;
        $extension_de_evento->tipo = 'Extensión de horario';

        $extension_de_evento->user_id = auth()->id(); //registra al usuario que crea el evento
        //$extension_de_evento->descripcion = $request->descripcion;

        $extension_de_evento->dia_de_semana = $dia_de_semana;
        $extension_de_evento->hora_de_inicio = $hora_de_inicio;
        $extension_de_evento->hora_de_fin = $hora_de_fin;
        $extension_de_evento->es_extencion_del_evento_id = $evento_id;

        $extension_de_evento -> save();

    }

    //funcion para agregar dia y hora adicionales a un evento
    public function extender_evento_update($nombre, $dia_de_semana, $hora_de_inicio, $hora_de_fin, $id_extension, $activar_dia){
        
        $extension_de_evento = Evento::findOrFail($id_extension);

        $extension_de_evento->update([
            'user_id' => auth()->id(),
            'dia_de_semana' => $dia_de_semana,
            'hora_de_inicio' => $hora_de_inicio,
            'hora_de_fin' => $hora_de_fin,
            'activo' => $activar_dia,
        ]);

    }


    //funcion que recibe el numero del mes y devuelve un string con el nombre del mes
    public function nombre_mes($mes){
        switch ($mes) {
            case 1:
                return 'Enero';
                break;
            case 2:
                return 'Febrero';
                break;
            case 3:
                return 'Marzo';
                break;
            case 4:
                return 'Abril';
                break;
            case 5:
                return 'Mayo';
                break;
            case 6:
                return 'Junio';
                break;
            case 7:
                return 'Julio';
                break;
            case 8:
                return 'Agosto';
                break;
            case 9:
                return 'Septiembre';
                break;
            case 10:
                return 'Octubre';
                break;
            case 11:
                return 'Noviembre';
                break;
            case 12:
                return 'Diciembre';
                break;
            default:
                return $mes;
                break;
        }
    }


}
