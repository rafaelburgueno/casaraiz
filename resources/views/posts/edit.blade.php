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

                <button type="submit" class="btn btn-outline-secondary btn-block btn-procesando-post">Actualizar</button>
              
            </form>

            <form action="{{ route('blog.destroy', $post) }}" method="POST" class="alerta-antes-de-eliminar">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger my-1">Eliminar Post</button>
            </form>

        </div>
    </div>

</div>

<script>
    $(document).ready(function(){

        $('.btn-procesando-post').click(function(){
            if(
                document.getElementById("titulo").value != '' &&  
                document.getElementById("summernote").value != '' 
            ){

            
                let timerInterval
                Swal.fire({
                title: 'Procesando',
                html: 'Por favor espere.',
                //timer: 10000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
            }
        });




        /* SWEETALERT ANTES DE ELIMINAR UN ELEMENTO */
        $('.alerta-antes-de-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: '¿Realmente quiere eliminar el elemento?',
                text: "Esta acción será irreversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar.',
                cancelButtonText: 'Cancelar.'
            }).then((result) => {
                if (result.isConfirmed) {
                /*Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );*/
                    this.submit();
                }
            })

        });





    });
    
</script>


@endsection