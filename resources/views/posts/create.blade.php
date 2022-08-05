@extends('layouts.plantilla-post')

@section('title', 'Crear Post')
@section('meta-description', 'metadescripción de la pagina de creacion de posts')


@section('content')


<div class="container">

    <h2 class="text-center">Creación de posts</h2>
    
    <div class="row mb-5">
  
      <div class="col-md-12">
          <form action="{{route('blog.store')}}" method="POST">
              @csrf
              
              <div class="form-group mt-3 mb-1 mx-1">
                  {{--<label for="titulo">Titulo</label>--}}
                  <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{old('titulo')}}">
                  @error('titulo')
                      <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror
              </div>
              {{--<div class="form-group mb-3">
                  <label for="categorias">categorias (opcional)</label>
                  <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                  @error('categorias')
                      <div class="alert alert-danger mt-1">{{ $message }}</div>
                  @enderror
              </div>--}}
              


              <div class="mb-2 ">
                  <textarea class="" name="html" id="summernote">{{old('html')}}</textarea>
              </div>

              @error('html')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

              <button type="submit" class="btn btn-primary btn-block">Guardar</button>
              
          </form>
      </div>
  </div>

</div>


@endsection