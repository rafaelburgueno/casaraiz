@extends('layouts.plantilla')

@section('title', 'Editar ' . $propuesta->nombre)
@section('meta-description', 'metadescripcion para la pagina de edición de propuesta')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">Id:{{$propuesta->id}} | {{$propuesta->nombre}}</h1>
</div>


<div class="container mt-5">

    <div class="text-center mt-4">
        <h2 id="in" class="text-center pt-2">Editar propuesta</h2>
    </div>

    <div class="row mb-5">
        <div class="col-md-12 p-3">

            <form class="" action="{{route('propuestas.update', $propuesta)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col col-md-6">

                        <!-- Forma de colaboracion -->
                        <div class="form-group mb-3">
                            <label for="forma_de_colaboracion">Forma de colaboración</label>
                            <select class="form-control" id="forma_de_colaboracion" name="forma_de_colaboracion">
                                <option value="Productos del emprendimiento" @selected((old('forma_de_colaboracion') == "Productos del emprendimiento") || $propuesta->forma_de_colaboracion == "Productos del emprendimiento" )>Productos del emprendimiento</option>
                                <option value="Aporte económico" @selected((old('forma_de_colaboracion') == "Aporte económico") || $propuesta->forma_de_colaboracion == "Aporte económico" )>Aporte económico</option>
                                <option value="Talleres" @selected((old('forma_de_colaboracion') == "Talleres") || $propuesta->forma_de_colaboracion == "Talleres" )>Talleres</option>
                                <option value="Charlas" @selected((old('forma_de_colaboracion') == "Charlas") || $propuesta->forma_de_colaboracion == "Charlas" )>Charlas</option>
                                <option value="Asesoramiento" @selected((old('forma_de_colaboracion') == "Asesoramiento") || $propuesta->forma_de_colaboracion == "Asesoramiento" )>Asesoramiento</option>
                                <option value="Otro" @selected((old('forma_de_colaboracion') == "Otro") || $propuesta->forma_de_colaboracion == "Otro" )>Otro</option>
                            </select>
                        </div>
                        
                        <!-- nombre -->
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre', $propuesta->nombre)}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- nombre del emprendimiento -->
                        <div class="form-group mb-3">
                            <label for="nombre_del_emprendimiento">Nombre del emprendimiento</label>
                            <input type="text" class="form-control" id="nombre_del_emprendimiento" name="nombre_del_emprendimiento" placeholder="..." value="{{old('nombre_del_emprendimiento', $propuesta->nombre_del_emprendimiento)}}">
                            @error('nombre_del_emprendimiento')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- descripcion -->
                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea required class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion', $propuesta->descripcion)}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- imagen -->
                        <div class="form-group mb-3">
                                <label for="imagen">Imagen</label>

                                @if ($propuesta->imagen)
                                <div class="pb-3 ">
                                    <img src="{{$propuesta->imagen->url}}" style="width: 50%;" class="img-fluid d-block mx-auto">
                                </div>
                                @endif

                                <input type="file" class="form-control pt-3 pb-5" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                                @error('imagen')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                    </div>
                
                    <div class="col-md-6">

                        <!-- correo -->
                        <div class="form-group mb-3">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="..." value="{{old('correo', $propuesta->correo)}}">
                            @error('correo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- telefono -->
                        <div class="form-group mb-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="..." value="{{old('telefono', $propuesta->telefono)}}">
                            @error('telefono')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- redes sociales -->
                        <div class="form-group mb-3">
                            <label for="redes_sociales">Redes sociales <small>(opcional y sin arroba)</small></label>
                            <input type="text" class="form-control" id="redes_sociales" name="redes_sociales" placeholder="..." value="{{old('redes_sociales', $propuesta->redes_sociales)}}">
                            @error('redes_sociales')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- beneficio -->
                        <div class="form-group mb-3">
                            <label for="beneficio">Beneficio <small>(10% de descuento, 2 por 1, visita sin costo, primera clase gratis, etc.)</small></label>
                            <input type="text" class="form-control" id="beneficio" name="beneficio" placeholder="..." value="{{old('beneficio', $propuesta->beneficio)}}">
                            @error('beneficio')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- publicar -->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="publico" name="publico" value="1" @checked(old('publico', $propuesta->publico))>
                            <label class="form-check-label" for="publico">Publicar?</label>
                        </div>

                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block spin-procesando">Actualizar</button>
            </form>


            
            <form action="{{ route('propuestas.destroy', $propuesta) }}" method="POST" class="alerta_antes_de_eliminar">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
            </form>
            

        </div>
    </div>


</div>


<script>
    $(document).ready(function(){

        function spin(){
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
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        }

        $('.spin-procesando').click(function(){
            if(
                //document.getElementById("forma_de_colaboracion").value != '' &&
                document.getElementById("nombre").value != '' &&
                document.getElementById("descripcion").value != ''  
            ){
                spin();
            }

        });


        /* MENSAJE PARA CONFIRMAR LA ELIMINACION DE UN ELEMENTO */
        $('.alerta_antes_de_eliminar').submit(function(e){
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
                    spin();
                    this.submit();
                }
            })

        });

    });

</script>


@endsection


