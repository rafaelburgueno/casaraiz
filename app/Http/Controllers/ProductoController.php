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
        
        /*if(Auth::check() && Auth::user()->rol == 'administrador'){*/
            //al administrador se le mostraran todos los posts
            //$productos = Producto::orderBy('nombre','desc')->get();
            $productos = Producto::orderBy('nombre','desc')->get();
        /*}else{
            //a los usuarios normales se le mostraran solo los posts publicados
            $productos = Producto::where('activo', true)->orderBy('nombre','desc')->paginate(12);
            //$productos = Producto::where('activo', true)->orderBy('created_at','desc')->get();
        }*/
        
        return view('productos.index', compact('productos'));
    }


    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
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
        
        $producto = new Producto();

        $producto->slug = Str::slug($request->nombre, '-');
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        
        if($request->activo){
            $producto->activo = true;
        }else{
            $producto->activo = false;
        }

        $producto->user_id = auth()->id(); //usuario logueado que registra el producto
        if($request->proveedor){
            $producto->proveedor = $request->proveedor;
        }/*else{
            $producto->proveedor = '';
        }*/

        //$producto->categorias = $request->categorias;

        $producto -> save();

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
                'multimediaable_id' => $producto->id,
                'multimediaable_type' => 'App\Models\Producto',
            ]);

            //return 'se guardo todo';
        }


        //$producto = Evento::create($request->all());

        session()->flash('exito', 'El producto fue creado.');
        return redirect() -> route('productos.show', $producto);
        //return view('tienda.show')->with('tienda', $producto);
        //return redirect() -> route('tienda.index');
    }






    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //return $producto;
        //return 'Hola producto '.dd($producto->nombre);
        // hay que reenviarlo a la vista show con el nombre $producto
        return view('productos.show', compact('producto'));
        //return view('producto.show')->with('producto', $producto);
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //return 'el producto a editar es '.$producto->nombre;
        return view('productos.edit', compact('producto'));
        //return view('productos.edit')->with('producto', $producto);
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
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
        //$producto = Producto::findOrFail($id);
        $producto->slug = strtolower(str_replace(' ', '-', $request->nombre));
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        //$producto->user_id = $request->user_id;

        $producto->precio = $request->precio;
        $producto->stock = $request->stock;

        if($request->activo){
            $producto->activo = true;
        }else{
            $producto->activo = false;
        }

        $producto->user_id = auth()->id(); //usuario logueado que registra el producto
        if($request->proveedor){
            $producto->proveedor = $request->proveedor;
        }else{
            $producto->proveedor = '';
        }

        //$producto->proveedor = $request->proveedor;
        //$producto->categorias = $request->categorias;

        //$producto -> cupos_disponibles = $request -> cupos_disponibles;
        //$producto->relevancia = $request->relevancia;

        //return $producto;
        $producto -> save();
        
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
                'multimediaable_id' => $producto->id,
                'multimediaable_type' => 'App\Models\Producto',
            ]);

            //return 'se guardo todo';
        }

        session()->flash('exito', 'El producto fue editado.');
        return redirect() -> route('productos.show', $producto);
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        session()->flash('exito', 'El producto fue eliminado.');
        
        //$tienda->activo = 0;
        //$tienda -> save();
        //session()->flash('exito', 'El producto fue desactivado.');

        return redirect() -> route('productos.index');
    }




}
