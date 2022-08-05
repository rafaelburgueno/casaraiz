<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    

    public function index()
    {
        $posts = Post::where('activo', true)->orderBy('updated_at','desc')->paginate(5);
        //return "lista de posts";
        //return view('posts.index');
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
            'titulo' => 'required',
            'html' => 'required|min:10',
        ]);

        $post = new Post;
        
        $post->titulo = $request->titulo;
        $post->slug = strtolower(Str::slug($request->titulo, '-'));
        //$post->categorias = $request->categorias;
        //$post->descripcion = $request->titulo;
        //$post->texto = $request->titulo;
        $post->html = $request->html;

        $post->save();


        //$file = var_dump($request->files);
        //$file = $request->all();

        return redirect()->route('blog.index');
    }



}
