@extends('layouts.plantilla')

@section('title', 'Blog')
@section('meta-description', 'metadescripción de la pagina Blog')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">BLOG</h1>
</div>


<div class="container">


    @if(Auth::check() && ( Auth::user()->rol == 'administrador' || Auth::user()->rol == 'colaborador' ))
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
                @if (count($post->multimedias) && $post->multimedias->last()->imagen_con_info)
                    <a href="{{route('blog.show', $post)}}" class="">
                        <img  src="{{$post->multimedias->last()->url}}" class="card-img-top" alt="{{ $post->multimedias->last()->descripcion }}">
                    </a>
                @else
                    @if (count($post->multimedias))
                        <a href="{{route('blog.show', $post)}}" class="">
                            <img src="{{$post->multimedias->last()->url}}" class="card-img-top" alt="{{ $post->multimedias->last()->descripcion }}">
                        </a>
                    @endif

                    <div class="card-body pb-2">
                        <a href="{{route('blog.show', $post)}}" class="">
                            <h5 class="card-title titulo">{{$post->titulo}}</h5>
                        </a>
                        @if(!$post->activo)
                            <p class=""><small class="m-1 p-1 text-light bg-danger">Este post no es público</small></p>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0"><small class="">Por {{$post->autor()}}</small></p>
                            <small class="mb-0">Creado el {{ $post->updated_at->format('d/m/Y') }}</small>
                        </div>
        
                        {{--<p class="card-text">{{Str::limit($post->html, 100)}}</p>--}}
                        
                        {{--<a href="{{route('blog.show', $post)}}" class=""><small>leer...</small></a>--}}
                        
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    
        
    
    </div>
    

    <!-- Botones de paginacion -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $posts->links('pagination::bootstrap-4') }}
	</div>



</div>


@endsection