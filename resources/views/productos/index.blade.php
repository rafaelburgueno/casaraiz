@extends('layouts.plantilla')

@section('title', 'Tienda')
@section('meta-description', 'metadescripción de la pagina Tienda')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">PRODUCTOS</h1>
</div>


<!-- Tabla de Productos -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css')}}" />--}}
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
{{--<script type="text/javascript" src="{{ asset('/js/calendar.js') }}"></script>--}}

<script>
	$(document).ready( function () {
		$('#table_id').DataTable({
			order: [
				[0, 'desc']
			]
		});
	} );
</script>


<div class="container">
		
	@if(Auth::check() && Auth::user()->rol == 'administrador')
	<div>
		<a class="btn btn-outline-secondary my-3" href="{{route('productos.create')}}">Crear Producto</a>
	</div>
	@endif
    

	<div class="pb-3" style="overflow-x: scroll;">
		<table id="table_id" class="display {{--table table-striped table-hover table-sm--}}">
			<thead>
				<tr>
					{{--<th>id</th>--}}
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Proveedor</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Activo?</th>
					<th>Creado</th>
					<th>Descripción</th>
					<th>Administrar</th>
					
				</tr>
			</thead>
			<tbody>
			
				@foreach ($productos as $producto)
					<tr>
						<td>{{ $producto->tipo }}</td>
						<td>{{ $producto->nombre }}</td>
						<td>{{ $producto->proveedor }}</td>
						<td>{{ $producto->precio }}</td>
						<td>{{ $producto->stock }}</td>
						<td>
							@if($producto->activo)
							SI
							@else
							NO
							@endif
						</td>
						<td>{{ $producto->created_at->format('d/m/Y') }}</td>
						<td>{{ $producto->descripcion }}</td>
						<td><a href="{{route('productos.edit', $producto)}}" class="btn btn-sm btn-outline-secondary ">Ver ></a></td>

						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>


<div class="text-center mb-4 mt-5">
    <h1 id="in" class="text-center pt-2">CREAR PRODUCTO</h1>
</div>


<div class="container">

    <div class="row mb-5 mt-5">
        <div class="col-md-12">

            <form class="p-3" action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">

                        <div class="form-group mb-3">
                            <label for="tipo">Tipo de producto</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="tienda">Tienda</option>
                                <option value="almacen de semillas">Almacen de semillas</option>
                                <option value="biblioteca">Biblioteca</option>
                                <option value="ludoteca">Ludoteca</option>
                            </select>
                            @error('tipo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre')}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="proveedor">Proveedor (opcional)</label>
                            <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="..." value="{{old('proveedor')}}">
                            @error('proveedor')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea required class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion')}}</textarea>
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
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio')}}" min="0">
                            @error('precio')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!--input para el stock-->
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock')}}" min="0">
                            @error('stock')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                            <label class="form-check-label" for="activo">Publicar</label>
                            @error('activo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
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
        
                <button type="submit" class="btn btn-outline-secondary btn-block spin-procesando">Crear</button>
            </form>
        </div>
    </div>


</div>


<script>
    $(document).ready(function(){
        $('.spin-procesando').click(function(){
            if(
                document.getElementById("tipo").value != '' &&
                document.getElementById("nombre").value != '' &&
                document.getElementById("descripcion").value != ''  
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
    });

</script>


@endsection