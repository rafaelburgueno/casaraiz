@extends('layouts.plantilla-post')

@section('title', 'Blog')
@section('meta-description', 'metadescripción de la pagina Blog')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">BLOG</h1>
</div>


<div class="container">

    @if(Auth::check() && ( Auth::user()->rol == 'administrador' || Auth::user()->rol == 'colaborador' ) )
        <div class="d-flex justify-content-between align-items-center p-1">
            {{--<a class="btn btn-outline-secondary" href="{{route('blog.create')}}">Crear Post</a>--}}
            <a class="btn btn-outline-secondary" href="{{route('blog.index')}}">< Volver</a>
            <a class="btn btn-outline-secondary" href="{{route('blog.edit', $post)}}">Editar ></a>
        </div>
    @endif

    
    <div class="mb-5">
        
        <div class="">

            <div class="card mt-3">

                <div class="">
                    <h3 class="h3 mt-3 text-center">{{ $post->titulo }}</h3>
                    @if(!$post->activo)
                        <div class="float-right m-0 p-0 pr-3"><span class="badge badge-danger">El post no es publico</span></div>
                    @endif
                </div>

                <div class="card-body">
                    {!! $post->html !!}
                </div>
                
                <div class="card-footer">

                    <div class="d-flex justify-content-between align-items-center p-1">
                        <small class="">Por {{$post->autor()}}</small>
                        <small class="">Creado el {{ $post->created_at->format('d/m/Y') }}</small>
                    </div>

                    @if(count($post->categorias))
                        <p>
                            <span class="badge">{{ $post->categorias }}</span>
                        </p>
                    @endif
                    
                </div>
                
            </div>
            
        </div>
        
    </div>

</div>


@endsection