@extends('layouts.plantilla-post')

@section('title', 'Crear Post')
@section('meta-description', 'metadescripción de la pagina de creacion de posts')


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">CREACIÓN DE POSTS</h1>
</div>


<div class="container">
    
    <div class="row mb-5">
  
      <div class="col-md-12">
          <form action="{{route('blog.store')}}" method="POST">
              @csrf
              
              <div class="form-group mt-3 mb-2 mx-1">
                  {{--<label for="titulo">Titulo</label>--}}
                  <input required type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
                  @error('titulo')
                      <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
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
                  <textarea required class="" name="html" id="summernote">{{old('html')}}</textarea>
              </div>

              @error('html')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

              <button type="submit" class="btn btn-secondary btn-block">Guardar</button>
              
          </form>
      </div>
  </div>

</div>


@endsection