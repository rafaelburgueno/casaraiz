@extends('layouts.plantilla')

@section('title', 'Editar ' . $producto->nombre)
@section('meta-description', 'metadescripcion para la pagina de edición de producto')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">Id:{{$producto->id}} | {{$producto->nombre}}</h1>
</div>


<!-- Tabla de Usuarios -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css')}}" />--}}
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
{{--<script type="text/javascript" src="{{ asset('/js/calendar.js') }}"></script>--}}

<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            order: [
                [1, 'desc']
            ]
        });
    } );
</script>


<div class="container">
    <div class="text-center my-4">
        <h2 id="in" class="text-center pt-2">Historial</h2>
    </div>
    <div class="pb-3" style="overflow-x: scroll;">
        <table id="table_id" class="display {{--table table-striped table-hover table-sm--}}">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    {{--<th>Inscripción</th>--}}
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>C.I.</th>
                    <th>Medio de pago</th>
                    {{--<th>Comentario</th>--}}
                    <th>Recibir novedades</th>
                    
                </tr>
            </thead>
            <tbody>
            
                @foreach ($producto->inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->id }}</td>
                        <td>{{ $inscripcion->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $inscripcion->nombre }}</td>
                        {{--<td>{{ $inscripcion->inscripto_a() }}</td>--}}
                        <td>{{ $inscripcion->correo }}</td>
                        <td>{{ $inscripcion->telefono }}</td>
                        <td>{{ $inscripcion->documento_de_identidad }}</td>
                        <td>{{ $inscripcion->medio_de_pago }}</td>
                        {{--<td>{{ $inscripcion->comentario }}</td>--}}
                        <td>
                            @if($inscripcion->recibir_novedades)
                                SI
                            @else
                                NO
                            @endif
                        </td>



                        {{--<td><a href="{{route('inscripcions.edit', $inscripcion)}}" class="btn btn-sm btn-outline-secondary ">Ver ></a></td>--}}
                        
                        {{--<form class="" action="{{route('inscripcions.update', $inscripcion)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <select class="" id="rol" name="rol">
                                    <option value="inscripcion" @selected((old('rol') == "inscripcion") || $inscripcion->rol == "inscripcion" )>inscripcion</option>
                                    <option value="colaborador" @selected((old('rol') == "colaborador") || $inscripcion->rol == "colaborador" )>colaborador</option>
                                    <option value="administrador" @selected((old('rol') == "administrador") || $inscripcion->rol == "administrador" )>administrador</option>
                                </select>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Guardar</button>
                            </td>
                        </form>--}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Botones de paginacion -->
    {{--{{ $eventos->links('pagination::bootstrap-4') }} --}}

</div>






<div class="container mt-5">

<div class="text-center mt-4">
    <h2 id="in" class="text-center pt-2">Editar producto</h2>
</div>



    <div class="row mb-5">
        <div class="col-md-12 p-3">

            <form class="" action="{{route('productos.update', $producto)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col col-md-6">

                        <!-- tipo de producto -->
                        <div class="form-group mb-3">
                            <label for="tipo">Tipo de producto</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="tienda" @selected((old('tipo') == "tienda") || $producto->tipo == "tienda" )>Tienda</option>
                                <option value="almacen de semillas" @selected((old('tipo') == "almacen de semillas") || $producto->tipo == "almacen de semillas" )>Almacen de semillas</option>
                                <option value="biblioteca" @selected((old('tipo') == "biblioteca") || $producto->tipo == "biblioteca" )>Biblioteca</option>
                                <option value="ludoteca" @selected((old('tipo') == "ludoteca") || $producto->tipo == "ludoteca" )>Ludoteca</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre', $producto->nombre)}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="proveedor">Proveedor (opcional)</label>
                            <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="..." value="{{old('proveedor', $producto->proveedor)}}">
                            @error('proveedor')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea required class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion', $producto->descripcion)}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                
                    <div class="col-md-6">

                        {{--<div class="form-group mb-3">
                            <label for="categorias">Categorías (opcional)</label>
                            <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                        </div>--}}

                        <div class="form-group mb-3">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio', $producto->precio)}}" min="0">
                        </div>

                        <!--input para el stock-->
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock', $producto->stock)}}" min="0">
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $producto->activo))>
                            <label class="form-check-label" for="activo">Publicar</label>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                            @error('imagen')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block spin-procesando">Actualizar</button>
            </form>


            
            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="alerta_antes_de_eliminar">
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
                document.getElementById("tipo").value != '' &&
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


