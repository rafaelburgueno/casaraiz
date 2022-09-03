<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\Mail;
use App\Mail\InscripcionMailable;
use App\Models\Evento;

class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'inscripciones index :D';
        $inscripciones = Inscripcion::all();
        
        
        return view('admin.inscripciones', compact('inscripciones'));
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
        //return request()->all();
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'id_evento' => 'required',
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'correo' => 'required|email',
            'documento' => 'required|numeric',
            'telefono' => 'required|numeric',
            'medio_de_pago' => 'required',
        ]);

        $evento = Evento::find($request->id_evento);

        $solicitud = $request->nombre.' '.$request->apellido.' solicita inscribirse al ' . $evento->tipo . ': ' . $evento->nombre;

        $user = NULL;
        if(auth()){
            $user = auth()->id();
        }

        Inscripcion::create([
            'user_id' => $user,
            'nombre' => $request->nombre.' '.$request->apellido,
            'correo' => $request->correo,
            'documento_de_identidad' => $request->documento,
            'telefono' => $request->telefono,
            'inscripcionable_id' => $request->id_evento,
            'inscripcionable_type' => 'App\Models\Evento',
            'medio_de_pago' => $request->medio_de_pago,
            'intereses' => NULL,
            'comentario' => 'Solicita inscribirse al ' . $evento->tipo . ': ' . $evento->nombre . '.',
            //'recibir_novedades' => NULL,
            
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
    public function update(Request $request, $id)
    {
        //
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
