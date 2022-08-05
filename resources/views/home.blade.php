@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'metadescripción de la pagina Home')


@section('content')

{{--@if(Auth::check())--}}
@if(Auth::check() && Auth::user()->rol == 'administrador')
    <div class="container mb-5">
        <a class="btn" href="{{route('eventos.create')}}">Crear Evento</a>
    </div>
@endif

<div class="container">
    <h1 id="in" class="text-center">PROXIMAMENTE EN CASA RAIZ...</h1>
</div>

<div class="container">
    <div id="carouselExampleFade" class="carousel slide carousel-fade align-items-center" data-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/storage/img/nieve.1.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/img/nieve.2.png">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/img/nieve.3.png">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/img/nieve.4.png">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/img/nieve.5.png" alt="Third slide">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/img/nieve.4.png">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/img/nieve.3.png">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/storage/img/nieve.2.png">
            </div>
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<script> 
    $('.carousel').carousel({
        interval: 10
    });
</script>




<div class="container mt-5">
    
    <div class="row">
    	<div class="col-md-6 mb-5">
			<h3 class="text-center h3">Eventos destacados</h3>
            <hr class="mx-5">
			@foreach ($eventos as $evento)
        	<div class="card mb-2 shadow-sm">
				<!--las 3 siguientes lineas habilitan o deshabilitan las imagenes-->    {{----}}
				{{--@if (count($t->multimedias))
				<img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="...">
				@endif--}}
				<div class="card-body">
					<p class="card-text">{{$evento->dia_de_semana}} {{$evento->dia}} de {{$evento->mes}}</p>
					<a href="{{route('eventos.show', $evento)}}" class="mt-2">
						<h5 class="card-title text-light">{{$evento->nombre}}</h5>
					</a>
					{{--<small class="card-text">A cargo de {{$evento->responsable}}</small>--}}
                    <p class="card-text">De {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</p>
	
					<div class="d-flex justify-content-between align-items-center mb-2">
						<div class="card-text">
                            <small>Entrada </small>
                            @if ($evento->costo_de_inscripcion == 0)
                                <span class="h4">Gratis</span>
                            @else
                                <span class="h4">${{$evento->costo_de_inscripcion}}</span>
                            @endif
                        </div>
                            
						<small class="text-light">{{$evento->cupos_totales}} cupos</small>
					</div>
	
					<p class="card-text">{{Str::limit($evento->descripcion, 100)}}</p>
					<div class="d-flex justify-content-between align-items-center mb-2">
						<a href="{{route('eventos.show', $evento)}}" class=""><small>más info...</small></a>
					</div>
						
				</div>
			</div>
			@endforeach
      	</div>
      	
		<div class="col-md-6 mb-5">
			<h3 class="text-center h3">Talleres</h3>
            <hr class="mx-5">
			@foreach ($talleres as $taller)
			
        	<div class="card mb-2 shadow-sm">
				<!--las 3 siguientes lineas habilitan o deshabilitan las imagenes-->    {{----}}
				{{--@if (count($taller->multimedias))
				<img src="{{$taller->multimedias->last()->url}}" class="card-img-top" alt="...">
				@endif--}}
				<div class="card-body">
					<p class="card-text">{{$taller->dia_de_semana}} de {{$taller->hora_de_inicio}} a {{$taller->hora_de_fin}}hs.</p>
					<a href="{{route('eventos.show', $taller)}}" class="mt-2">
						<h5 class="card-title text-light">{{$taller->nombre}}</h5>
					</a>
					<small class="card-text">A cargo de {{$taller->responsable}}</small>
	
					<div class="d-flex justify-content-between align-items-center mb-2">
                        @if($taller->costo_de_inscripcion == 0)
						    <div class="card-text"><small>Inscripcion</small> <span class="h5">sin costo</span></div>
						@else
                            <div class="card-text"><small>Inscripcion</small> <span class="h4">${{$taller->costo_de_inscripcion}}</span></div>
                        @endif
                        <small class="text-light">{{$taller->cupos_totales}} cupos</small>
					</div>
	
					<p class="card-text">{{Str::limit($taller->descripcion, 100)}}</p>
					<div class="d-flex justify-content-between align-items-center mb-2">
						<a href="{{route('eventos.show', $taller)}}" class=""><small>más info...</small></a>
					</div>
						
				</div>
			</div>
			@endforeach
      	</div>

    </div>
    
    
    
    
   

</div>







{{--<div>
    <h1>pagina home</h1>

    @if (Auth::check())
        <div>{{ Auth::user()->name }}</div>

        <div>
            @dump(Auth::user()->email)
        </div>

    @else
        <p>no estas logueado.</p>
    @endif
</div>--}}


@endsection