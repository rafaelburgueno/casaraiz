<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class PostController extends Controller
{
    

    public function index()
    {
        if(Auth::check() && Auth::user()->rol == 'administrador'){
            //al administrador se le mostraran todos los posts
            $posts = Post::orderBy('created_at','desc')->paginate(8);
        }else{
            //a los usuarios normales se le mostraran solo los posts publicados
            $posts = Post::where('activo', true)->orderBy('created_at','desc')->paginate(8);
        }
        
        return view('posts.index', compact('posts'));

    }



    public function create()
    {
        //return "crear post";
        return view('posts.create');
    }



    public function store(Request $request)
    {
        //return $request->all();
        //$slug = str_slug($post['titulo']);
        //$slug = Str::slug($request->titulo, '-');
        //Post::create($post);

        $request->validate([
            'titulo' => ['required', 'max:255'],
            'html' => ['required', 'max:4294967290'], // el tipo de dato longtext admite un máximo de 4294967295 caracteres'],
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $post = new Post;
        
        $post->titulo = $request->titulo;
        $post->slug = strtolower(Str::slug($request->titulo, '-'));
        $post->user_id = auth()->id(); //registra al usuario que crea el post
        //$post->categorias = $request->categorias;
        //$post->descripcion = $request->titulo;
        //$post->texto = $request->titulo;
        $post->html = $request->html;  
        /*if (str_contains($request->html, 'iframe')) {
            $post->html = PostController::video_responsive($request->html);
        }else{
            $post->html = $request->html;    
        }*/
        $post->save();


        //IMAGEN
        //se guarda en la carpeta storage/app/public/eventos/
        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/posts');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            $imagen_con_info = false;
            if($request->imagen_con_info){
                $imagen_con_info = true;
            }

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->titulo,
                'relevancia' => 1,
                'imagen_con_info' => $imagen_con_info,
                'resolucion' => 'TODO',
                'tamaño' => 'TODO',
                'multimediaable_id' => $post->id,
                'multimediaable_type' => 'App\Models\Post',
            ]);

            //return 'se guardo todo';
        }


        //$file = var_dump($request->files);
        //$file = $request->all();

        session()->flash('exito', 'El post fue creado.');

        return redirect()->route('blog.index');
    }



    public function show(Post $blog)
    {
        //return "mostrar post";
        return view('posts.show')->with('post', $blog);
    }
    


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    public function edit(Post $blog)
    {
        //$post = Post::findOrFail($id);
        //return view('posts.edit', compact('blog'));
        return view('posts.edit')->with('post', $blog);
    }



     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $blog
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(Request $request, Post $blog)
    {
        
        $request->validate([
            'titulo' => 'required|max:255',
            'html' => 'required|max:4294967290', // el tipo de dato longtext admite un máximo de 4294967295 caracteres
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $blog->titulo = $request->titulo;
        $blog->slug = strtolower(Str::slug($request->titulo, '-'));
        $blog->user_id = auth()->id(); //registra al usuario que crea el post

        $blog->html = $request->html;
        /*if (str_contains($request->html, 'iframe') && !str_contains($request->html, '<div class="col-sm video-responsive"><iframe')) {
            $blog->html = PostController::video_responsive($request->html);
        }else{
        }*/
        
        if($request->activo){
            $blog->activo = true;
        }else{
            $blog->activo = false;
        }

        //$blog->categorias = $request->categorias;
        //$blog->descripcion = $request->titulo;
        //$blog->texto = $request->titulo;

        $imagen_con_info = false;
            if($request->imagen_con_info){
                $imagen_con_info = true;
            }

        if($request->file('imagen')){
            
            //el metodo store() debe ejecutarse en la misma linea en la que se asigna a la variable(sino no funca)
            $imagen = $request->file('imagen')-> store('public/posts');
            
            //cambia el nombre de la ruta , para que sea accesible desde la carpeta public
            $url = Storage::url($imagen);

            Multimedia::create([
                'url' => $url,
                'descripcion' => $request->titulo,
                'relevancia' => 1,
                'imagen_con_info' => $imagen_con_info,
                'resolucion' => 'TODO',
                'tamaño' => 'TODO',
                'multimediaable_id' => $blog->id,
                'multimediaable_type' => 'App\Models\Post',
            ]);

            //return 'se guardo todo';
        }else{
            
            if(count( $blog->multimedias )){
                $blog->multimedias->last()->imagen_con_info = $imagen_con_info;
                $blog->multimedias->last()->save();
            }

        }


        $blog->save();

        session()->flash('exito', 'El post fue editado.');
        return redirect() -> route('blog.show', $blog);
        //return redirect()->route('blog.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {

        // buscamos todos los registros multimedia asociados a ese post
        // Multimedia::where('multimediaable_type', 'App\Models\Post')->where('multimediaable_id', $post->id)->delete();
        $multimedias = Multimedia::where('multimediaable_type', 'App\Models\Post')->where('multimediaable_id', $blog->id)->get();
        
        foreach($multimedias as $multimedia ) {
            //se cambia la url relativa por la url del directorio
            $url = str_replace('storage', 'public', $multimedia->url);
            
            // elimina de la carpeta
            Storage::delete($url);

            // Se eliminan de la base de datos las imagenes relacionadas al producto
            $multimedia->delete();
        }

        $blog->delete();
        session()->flash('exito', 'El post fue eliminado.');
        
        /*$blog->activo = 0;
        $blog -> save();
        session()->flash('exito', 'El post fue desactivado.');*/

        return redirect() -> route('blog.index');
    }


    /*public function video_responsive($data){

        $data = str_replace('<iframe ', '<div class="col-sm video-responsive"><iframe ',$data);
        $data = str_replace('</iframe>', '</iframe></div> ',$data);

        return $data;

    }*/



}
