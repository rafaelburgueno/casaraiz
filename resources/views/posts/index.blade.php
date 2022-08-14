@extends('layouts.plantilla')

@section('title', 'Blog')
@section('meta-description', 'metadescripción de la pagina Blog')


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">BLOG</h1>
</div>


<div class="container">


    @if(Auth::check() && Auth::user()->rol == 'administrador')
        <div>
            <a class="btn btn-outline-secondary my-3" href="{{route('blog.create')}}">Crear Post</a>
        </div>
    @endif


    <!-- Botones de paginacion -->
    {{--{{ $posts->links() }}--}}
    

    <div class="d-flex flex-wrap flex-row">
    
        @foreach ($posts as $post)
        <div class="col-md-6">
            <div class="card m-3">
                
                <div class="card-body">
                    <a href="{{route('blog.show', $post)}}" class="">
                        <h5 class="card-title titulo">{{$post->titulo}}</h5>
                    </a>
                    @if(!$post->activo)
                        <p class=""><small class="p-1 text-light bg-danger">Este post no es público</small></p>
                    @endif
                    <p><small class="">Por {{$post->autor()}}</small></p>
    
                    {{--<p class="card-text">{{Str::limit($post->html, 100)}}</p>--}}
                    
                    {{--<a href="{{route('blog.show', $post)}}" class=""><small>leer...</small></a>--}}
                      
                </div>
            </div>
        </div>
        @endforeach
    
        
    
    </div>
    

    <!-- Botones de paginacion -->
    {{--{{ $posts->links() }}--}}



</div>


@endsection