<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
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
        //$eventos = Evento::all();
        //devuelve los eventos paginados
        // ...test/eventos?page=2
        //$eventos = Evento::orderBy('fecha','desc')->paginate();
        //obtiene los eventos mas recientes
        $eventos = Evento::where('fecha', '>', now())->where('activo', true)->where('frecuencia_semanal', false)->orderBy('fecha','asc')->paginate();
        
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
            'nombre' => 'required',
            //'fecha' => 'required',
            'responsable' => 'required',
            'descripcion' => 'required',
            //'espacio' => 'required|min:3|max:100',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            //'imagen' => 'image',
        ]);
        
        $evento = new Evento();

        $evento->slug = strtolower(Str::slug($request->nombre, '-'));
        $evento->nombre = $request->nombre;
        $evento->tipo = $request->tipo;
        $evento->relevancia = $request->relevancia;

        $evento->user_id = 1; //TODO: cambiar por el usuario logueado
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

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'TODO',
                'tamaño' => 'TODO',
                'multimediaable_id' => $evento->id,
                'multimediaable_type' => 'App\Models\Evento',
            ]);

            //return 'se guardo todo';
        }


        //$evento = Evento::create($request->all());

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
            'nombre' => 'required',
            'responsable' => 'required',
            'descripcion' => 'required',
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
        $evento->tipo = $request->tipo;
        $evento->relevancia = $request->relevancia;

        $evento->responsable = $request->responsable;
        $evento->descripcion = $request->descripcion;
        //$evento->categoria = $request->categoria; //TODO: resolver la asignacion de categorias        $evento->espacio = $request->espacio;
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

        
        $evento -> save();
        
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/eventos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'TODO',
                'tamaño' => 'TODO',
                'multimediaable_id' => $evento->id,
                'multimediaable_type' => 'App\Models\Evento',
            ]);

            //return 'se guardo todo';
        }

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
