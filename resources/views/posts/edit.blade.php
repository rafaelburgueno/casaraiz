@extends('layouts.plantilla-post')

@section('title', 'Editar Post')
@section('meta-description', 'metadescripción de la pagina de edición de posts')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">EDICIÓN DE POSTS</h1>
</div>


<div class="container">
    
    <div class="row mb-5">
  
        <div class="col-md-12">
            <form action="{{route('blog.update', $post)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              
                <div class="form-group mt-3 mb-2 mx-1">
                    {{--<label for="titulo">Titulo</label>--}}
                    <input required type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo', $post->titulo)}}">
                    @error('titulo')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                    @error('imagen')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    <div class="form-check mb-2">
                        @if (count($post->multimedias))
                            <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info', $post->multimedias->last()->imagen_con_info))>
                        @else
                            <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info'))>
                        @endif
                        <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del post?</label>
                    </div>
                </div>

                {{--<div class="form-group mb-3">
                    <label for="categorias">categorias (opcional)</label>
                    <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                    @error('categorias')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>--}}
              


                <div class="mb-2 ">
                    <textarea required class="" name="html" id="summernote">{{old('html', $post->html)}}</textarea>
                </div>

                @error('html')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror

                <div class="form-check my-3">
                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $post->activo))>
                    <label class="form-check-label" for="activo">Publicar</label>
                </div>

                <button type="submit" class="btn btn-outline-secondary btn-block">Actualizar</button>
              
            </form>

            <form action="{{ route('blog.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger my-1">Eliminar Post</button>
            </form>

        </div>
    </div>

</div>


@endsection