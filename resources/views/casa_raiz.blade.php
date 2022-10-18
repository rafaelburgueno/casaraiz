@extends('layouts.plantilla')

@section('title', 'Sobre Casa Raíz')
@section('meta-description', 'metadescripción de la pagina Sobre Casa Raíz')

@section('content')




<!-- Imagen apaisada con logo -->
<!-- Imagen apaisada con logo -->
<!-- Imagen apaisada con logo -->
<!-- Imagen apaisada con logo -->
<div>
	<img src="{{asset('/storage/img/nav.10.png')}}" class="d-block w-100" alt="...">
</div>




<!-- Card principal con foto -->
<!-- Card principal con foto -->
<!-- Card principal con foto -->
<!-- Card principal con foto -->
<div class="container mt-5">
    <div id="myDIV" class="card" width="18rem" style="opacity:95%;   background-image: linear-gradient(to bottom right, rgb(48, 66, 60), rgb(198, 98, 103), rgb(198, 158, 98));">
        <img class="card-img-top" src="{{asset('/storage/img/casa.png')}}" alt="Card image cap">

        <h1 class="card-header text-center" style="color: #eaf0e4;">
            Casa Raíz es un espacio cultural,
        </h1>
        <div class="card-body text-center">
            <h3 class="card-title " style="color: #f0b6be">ubicado en La Floresta, Uruguay</h3><br>
            <h3 class="card-text " style="color: #f8f0f1">en el cual se
                desarrollan <br>diversos talleres y eventos culturales.
            </h3><br>

        </div>
    </div><br>

</div>




<!-- Video -->
<!-- Video -->
<!-- Video -->
<!-- Video -->
<div class="container px-4 my-2">
    <div class="row">
        <div class="col-sm video-responsive mt-3">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/dKoQzOjflLo"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>
</div>





<br id="almacen_de_semillas_ruta">
<br><br>

@if(count($almacen_de_semillas))
	<div class="text-center my-4">
		<h1 id="in" class="text-center pt-2">ALMACEN DE SEMILLAS</h1>
	</div>

	<div class="container">
		
		<div class="card-columns talleres">
			
			@foreach ($almacen_de_semillas as $semilla)
			<div class="px-3 pb-5">
				<div class="card m-0">
					@if (count($semilla->multimedias))
					{{--<a href="{{route('tienda.show', $semilla)}}" class="">--}}
						<img src="{{$semilla->multimedias->last()->url}}" class="card-img-top" alt="...">
					{{--</a>--}}
					@endif
					
					<div class="card-body">
					
						{{--<a href="{{route('tienda.show', $semilla)}}" class="mt-2">--}}
							<h5 class="card-title text-dark">{{$semilla->nombre}}</h5>
						{{--</a>--}}

						@if(!$semilla->activo)
							<p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
						@endif
					
						<div class="d-flex justify-content-between align-items-center mb-2">
							@if($semilla->precio)
								<p class="card-text">${{$semilla->precio}}</p>
							@endif
							<small class="text-dark">{{ $semilla->stock }} unidades en stock.</small>
						</div>
						
						@if($semilla->proveedor)
						<small class="card-text">De la mano de {{$semilla->proveedor}}</small>
						@endif

						<p class="card-text">{{Str::limit($semilla->descripcion, 50)}}</p>
					
						@if (count($semilla->categorias))
							<small class="card-text text-dark">Categorias: {{$semilla->categorias}}</small>
						@endif

					</div>
				</div>

			</div>
			@endforeach

		</div>

		


	</div>
@endif


<br id="biblioteca_ruta">
<br><br>

@if(count($biblioteca))
	<div class="text-center my-4">
		<h1 id="in" class="text-center pt-2">BIBLIOTECA</h1>
	</div>

	<div class="container">
		
		<div class="card-columns talleres">
			
			@foreach ($biblioteca as $libro)
			<div class="px-3 pb-5">
				<div class="card m-0">
					@if (count($libro->multimedias))
					{{--<a href="{{route('tienda.show', $libro)}}" class="">--}}
						<img src="{{$libro->multimedias->last()->url}}" class="card-img-top" alt="...">
					{{--</a>--}}
					@endif
					
					<div class="card-body">
					
						{{--<a href="{{route('tienda.show', $libro)}}" class="mt-2">--}}
							<h5 class="card-title text-dark">{{$libro->nombre}}</h5>
						{{--</a>--}}

						@if(!$libro->activo)
							<p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
						@endif
					
						<div class="d-flex justify-content-between align-items-center mb-2">
							@if($libro->precio)
								<p class="card-text">${{$libro->precio}}</p>
							@endif
							<small class="text-dark">{{ $libro->stock }} unidades en stock.</small>
						</div>
						
						@if($libro->proveedor)
						<small class="card-text">De la mano de {{$libro->proveedor}}</small>
						@endif

						<p class="card-text">{{Str::limit($libro->descripcion, 50)}}</p>
					
						@if (count($libro->categorias))
							<small class="card-text text-dark">Categorias: {{$libro->categorias}}</small>
						@endif

					</div>
				</div>

			</div>
			@endforeach

		</div>


	</div>
@endif


<br id="ludoteca_ruta">
<br><br>

@if(count($ludoteca))
	<div class="text-center my-4">
		<h1 id="in" class="text-center pt-2">LUDOTECA</h1>
	</div>

	<div class="container">
		
		<div class="card-columns talleres">
			
			@foreach ($ludoteca as $juego)
			<div class="px-3 pb-5">
				<div class="card m-0">
					@if (count($juego->multimedias))
					{{--<a href="{{route('tienda.show', $juego)}}" class="">--}}
						<img src="{{$juego->multimedias->last()->url}}" class="card-img-top" alt="...">
					{{--</a>--}}
					@endif
					
					<div class="card-body">
					
						{{--<a href="{{route('tienda.show', $juego)}}" class="mt-2">--}}
							<h5 class="card-title text-dark">{{$juego->nombre}}</h5>
						{{--</a>--}}

						@if(!$juego->activo)
							<p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
						@endif
					
						<div class="d-flex justify-content-between align-items-center mb-2">
							@if($juego->precio)
								<p class="card-text">${{$juego->precio}}</p>
							@endif
							<small class="text-dark">{{ $juego->stock }} unidades en stock.</small>
						</div>
						
						@if($juego->proveedor)
						<small class="card-text">De la mano de {{$juego->proveedor}}</small>
						@endif

						<p class="card-text">{{Str::limit($juego->descripcion, 50)}}</p>
					
						@if (count($juego->categorias))
							<small class="card-text text-dark">Categorias: {{$juego->categorias}}</small>
						@endif

					</div>
				</div>


				


			</div>
			@endforeach

		</div>


	</div>
@endif




@endsection