<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class ProductoController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::check() && Auth::user()->rol == 'administrador'){
            //al administrador se le mostraran todos los posts
            //$productos = Producto::orderBy('nombre','desc')->get();
            $productos = Producto::orderBy('nombre','desc')->paginate(9);
        }else{
            //a los usuarios normales se le mostraran solo los posts publicados
            $productos = Producto::where('activo', true)->orderBy('nombre','desc')->paginate(12);
            //$productos = Producto::where('activo', true)->orderBy('created_at','desc')->get();
        }
        
        return view('tienda.index', compact('productos'));
    }





    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tienda.create');
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre' => 'required|max:255',
            'proveedor' => 'max:100',
            'precio' => 'numeric',
            'descripcion' => 'max:255',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            //'imagen' => 'image',
        ]);
        
        $tienda = new Producto();

        $tienda->slug = Str::slug($request->nombre, '-');
        $tienda->nombre = $request->nombre;
        $tienda->descripcion = $request->descripcion;
        $tienda->precio = $request->precio;
        $tienda->stock = $request->stock;
        
        if($request->activo){
            $tienda->activo = true;
        }else{
            $tienda->activo = false;
        }

        $tienda->user_id = auth()->id(); //usuario logueado que registra el producto
        if($request->proveedor){
            $tienda->proveedor = $request->proveedor;
        }/*else{
            $tienda->proveedor = '';
        }*/

        //$tienda->categorias = $request->categorias;

        $tienda -> save();

        //return $request->all();
        //IMAGEN
        //php artisan storage:link
        //se guarda en la carpeta storage/app/public/eventos/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/productos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tamaño' => 'no se',
                'multimediaable_id' => $tienda->id,
                'multimediaable_type' => 'App\Models\Producto',
            ]);

            //return 'se guardo todo';
        }


        //$producto = Evento::create($request->all());

        session()->flash('exito', 'El producto fue creado.');
        return redirect() -> route('tienda.show', $tienda);
        //return view('tienda.show')->with('tienda', $tienda);
        //return redirect() -> route('tienda.index');
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $tienda)
    {
        //return $tienda;
        //return 'Hola producto '.dd($producto->nombre);
        // hay que reenviarlo a la vista show con el nombre $tienda
        return view('tienda.show', compact('tienda'));
        //return view('tienda.show')->with('producto', $tienda);
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $tienda)
    {
        //return 'el producto a editar es '.$producto->nombre;
        return view('tienda.edit', compact('tienda'));
        //return view('tienda.edit')->with('producto', $tienda);
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $tienda)
    {
        //debe llamarse tienda porque es el nombre especificado en la ruta (php artisan route:list)
        //return $request->all();
        $request->validate([
            'nombre' => 'required|max:255',
            'proveedor' => 'max:100',
            'precio' => 'numeric',
            'descripcion' => 'required|max:255', //TODO: revisar el almacemaniento maximo para el campo descripcion
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        //TODO actualizar el campo slug
        //$tienda = Producto::findOrFail($id);
        $tienda->slug = strtolower(str_replace(' ', '-', $request->nombre));
        $tienda->nombre = $request->nombre;
        $tienda->descripcion = $request->descripcion;
        //$tienda->user_id = $request->user_id;

        $tienda->precio = $request->precio;
        $tienda->stock = $request->stock;

        if($request->activo){
            $tienda->activo = true;
        }else{
            $tienda->activo = false;
        }

        $tienda->user_id = auth()->id(); //usuario logueado que registra el producto
        if($request->proveedor){
            $tienda->proveedor = $request->proveedor;
        }

        //$tienda->proveedor = $request->proveedor;
        //$tienda->categorias = $request->categorias;

        //$tienda -> cupos_disponibles = $request -> cupos_disponibles;
        //$tienda->relevancia = $request->relevancia;

        //return $tienda;
        $tienda -> save();
        
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/productos');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->nombre,
                'relevancia' => 1,
                'resolucion' => 'no se',
                'tamaño' => 'no se',
                'multimediaable_id' => $tienda->id,
                'multimediaable_type' => 'App\Models\Producto',
            ]);

            //return 'se guardo todo';
        }

        session()->flash('exito', 'El producto fue editado.');
        return redirect() -> route('tienda.show', $tienda);
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $tienda)
    {
        $tienda->delete();
        //cambia el campo activo a 0
        //$tienda->activo = 0;
        //$tienda -> save();

        session()->flash('exito', 'El producto fue eliminado.');
        return redirect() -> route('tienda.index');
    }




}
