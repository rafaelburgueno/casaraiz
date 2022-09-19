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


@endsection