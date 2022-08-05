@extends('layouts.plantilla')

@section('title', 'Blog')
@section('meta-description', 'metadescripción de la pagina Blog')


@section('content')


@if(Auth::check() && Auth::user()->rol == 'administrador')
    <div class="container mb-5">
        <a class="btn" href="{{route('blog.create')}}">Crear Post</a>
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
    {{ $posts->links() }}
    
    <div class="mb-5">
        @foreach ($posts as $post)
        <div class="">

            <div class="card m-3 mb-5">

                <div class="card-header">
                    <h3 class="h3 my-2 text-light text-center">{{ $post->titulo }}</h3>
                </div>

                <div class="card-body">
                    {!! $post->html !!}
                </div>
                
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center p-1">
                        <p><span class="badge ">{{ $post->categorias }}</span></p>
                        <p class="text-light"><small>{{ $post->updated_at }}</small></p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-1">
                        {{--<a href="{{route('posts.index')}}" class="btn text-light">< Volver</a>
                        <a href="{{route('posts.edit', $post)}}" class="btn text-light">editar ></a>--}}
                    </div>
                </div>
                
            </div>
            
        </div>
        @endforeach
    </div>
    

    <!-- Botones de paginacion -->
    {{ $posts->links() }}



</div>


@endsection