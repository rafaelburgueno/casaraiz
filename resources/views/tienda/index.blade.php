@extends('layouts.plantilla')

@section('title', 'Tienda')
@section('meta-description', 'metadescripción de la pagina Tienda')


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">TIENDA</h1>
</div>


<div class="container">

		
        @if(Auth::check() && Auth::user()->rol == 'administrador')
        <div>
            <a class="btn btn-outline-secondary my-3" href="{{route('tienda.create')}}">Crear Producto</a>
        </div>
        @endif
    
    
    {{--<hr class="mt-1 mx-3">--}}
    
    <div class="d-flex flex-wrap flex-row mb-3">
		
		@foreach ($productos as $producto)
		<div class="col-md-4">
			<div class="card mb-4">
				@if (count($producto->multimedias))
					<img src="{{$producto->multimedias->last()->url}}" class="card-img-top" alt="...">
				@endif
				
				<div class="card-body">
				
					<a href="{{route('tienda.show', $producto)}}" class="mt-2">
						<h5 class="card-title text-dark">{{$producto->nombre}}</h5>
					</a>

                    @if(!$producto->activo)
                        <p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
                    @endif
				
					<div class="d-flex justify-content-between align-items-center mb-2">
						<p class="card-text">${{$producto->precio}}</p>
						<small class="text-dark">{{ $producto->stock }} unidades en stock.</small>
					</div>
					
                    @if($producto->proveedor)
					<small class="card-text">De la mano de {{$producto->proveedor}}</small>
                    @endif

					<p class="card-text">{{Str::limit($producto->descripcion, 50)}}</p>
				
					<div class="d-flex justify-content-between align-items-center mb-1">
						<a href="{{route('tienda.show', $producto)}}" class=""><small>más info...</small></a>
                        @if (count($producto->categorias))
						    <small class="card-text text-dark">Categorias: {{$producto->categorias}}</small>
                        @endif
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>


	<!-- Botones de paginacion -->
	{{--{{ $productos->links() }}--}}
    {{ $productos->links('pagination::bootstrap-4') }}

</div>


@endsection