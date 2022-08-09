@extends('layouts.plantilla')

@section('title', 'Blog')
@section('meta-description', 'metadescripción de la pagina Blog')


@section('content')


@if(Auth::check() && Auth::user()->rol == 'administrador')
    <div class="container mb-5">
        <a class="btn btn-outline-primary" href="{{route('blog.create')}}">Crear Post</a>
    </div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="h2">Últimos post de nuestro blog</h1>
        </div>
    </div>
    
    <hr class="my-5">

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
                        <p class=""><small class="p-1 text-light bg-danger">El post no es publico</small></p>
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