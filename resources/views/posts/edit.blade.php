@extends('layouts.plantilla-post')

@section('title', 'Editar Post')
@section('meta-description', 'metadescripción de la pagina de edición de posts')


@section('content')


<div class="container">

    <h2 class="text-center">Edición de posts</h2>
    
    <div class="row mb-5">
  
        <div class="col-md-12">
            <form action="{{route('blog.update', $post)}}" method="POST">
                @csrf
                @method('PUT')
              
                <div class="form-group mt-3 mb-2 mx-1">
                    {{--<label for="titulo">Titulo</label>--}}
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo', $post->titulo)}}">
                    @error('titulo')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $post->activo))>
                    <label class="form-check-label" for="activo">Publicar</label>
                </div>

                {{--<div class="form-group mb-3">
                    <label for="categorias">categorias (opcional)</label>
                    <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                    @error('categorias')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>--}}
              


                <div class="mb-2 ">
                    <textarea class="" name="html" id="summernote">{{old('html', $post->html)}}</textarea>
                </div>

                @error('html')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
              
            </form>
        </div>
    </div>

</div>


@endsection