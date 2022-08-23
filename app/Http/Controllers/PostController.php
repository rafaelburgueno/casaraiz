<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    

    public function index()
    {
        if(Auth::check() && Auth::user()->rol == 'administrador'){
            //al administrador se le mostraran todos los posts
            $posts = Post::orderBy('created_at','desc')->get();
        }else{
            //a los usuarios normales se le mostraran solo los posts publicados
            $posts = Post::where('activo', true)->orderBy('created_at','desc')->get();
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
        ]);

        $post = new Post;
        
        $post->titulo = $request->titulo;
        $post->slug = strtolower(Str::slug($request->titulo, '-'));
        $post->user_id = auth()->id(); //registra al usuario que crea el post
        //$post->categorias = $request->categorias;
        //$post->descripcion = $request->titulo;
        //$post->texto = $request->titulo;
        $post->html = $request->html;

        $post->save();


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
        ]);

        $blog->titulo = $request->titulo;
        $blog->slug = strtolower(Str::slug($request->titulo, '-'));
        $blog->user_id = auth()->id(); //registra al usuario que crea el post
        $blog->html = $request->html;
        
        if($request->activo){
            $blog->activo = true;
        }else{
            $blog->activo = false;
        }

        //$blog->categorias = $request->categorias;
        //$blog->descripcion = $request->titulo;
        //$blog->texto = $request->titulo;

        $blog->save();

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
        //$blog->delete();
        //cambiar el campo activo a 0
        $blog->activo = 0;
        $blog -> save();


        return redirect() -> route('blog.index');
    }




}
