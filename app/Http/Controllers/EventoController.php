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
        $eventos = Evento::orderBy('fecha')->paginate();
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
            'nombre' => 'required|max:255',
            'tipo' => 'required|max:25',
            'responsable' => 'required|max:100',
            'descripcion' => 'required|max:255',
            'lugar' => 'max:100',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
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

        //return $request->all();
        //IMAGEN
        //php artisan storage:link
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

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
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

        return redirect() -> route('eventos.show', $evento);
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
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
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
        
        
        
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/eventos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            $imagen_con_info = false;
            if($request->imagen_con_info){
                $imagen_con_info = true;
            }

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'imagen_con_info' => $imagen_con_info,
                'resolucion' => 'TODO',
                'tamaño' => 'TODO',
                'multimediaable_id' => $evento->id,
                'multimediaable_type' => 'App\Models\Evento',
            ]);

            //return 'se guardo todo';
        }else{
            $imagen_con_info = false;
            if($request->imagen_con_info){
                $imagen_con_info = true;
            }
            $evento->multimedias->last()->imagen_con_info = $imagen_con_info;
            $evento->multimedias->last()->save();
        }

        $evento -> save();

        session()->flash('exito', 'El evento fue editado.');

        return redirect() -> route('eventos.show', $evento);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //$evento->delete();
        //TODO: cambiar el campo activo a 0
        $evento->activo = 0;
        $evento -> save();

        session()->flash('exito', 'El evento fue desactivado.');


        return redirect() -> route('eventos.index');
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
