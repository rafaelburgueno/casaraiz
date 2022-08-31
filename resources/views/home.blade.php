@extends('layouts.plantilla')

@section('title', 'Home')
@section('meta-description', 'metadescripción de la pagina Home')


@section('content')



<!-- Imagen apaisada con logo -->
<div>
	<img src="{{asset('/storage/img/nav.10.png')}}" class="d-block w-100" alt="...">
</div>


{{-- Boton de creacion de Eventos 
Solo se muestra si el usuario esta autentificado y si tiene rol 'administrador' --}}
{{--@if(Auth::check() && Auth::user()->rol == 'administrador')
    <div class="container mb-5">
        <a class="btn btn-outline-secondary" href="{{route('eventos.create')}}">Crear Evento</a>
    </div>
@endif--}}


<div class="text-center py-4 my-0">
    <h1 id="in" class="text-center">PROXIMAMENTE</h1>
</div>


<!-- social -->
@include('partials.social')


<!-- Carousel -->
@include('partials.carousel')



<!-- video -->
@include('partials.video')


	<!-- PRIMERAS TARJETAS-->
  	<!-- PRIMERAS TARJETAS-->
  	<!-- PRIMERAS TARJETAS-->
  	<!-- PRIMERAS TARJETAS-->

  	<div class="container">
    	<div class="row mt-5">

      		<div class="col-sm-4">
        		<div class="card ind">
          			<div class="card-body">
            			<h1 class="card-title text-center" id="card-index">UNITE A LA COMUNIDAD RAÍZ</h1>
            			<p class="card-text text-center" style="color: rgb(210, 238, 229); font-size: 22px;"><strong>Obtenés beneficios y colaborás con nuestra casaRAIZ </strong></p>
            			<a href="{{route('comunidad_raiz')}}" class="btn btn-lg" style="width: 100%;background-color:rgb(198, 98, 103); color: rgb(210, 238, 229) ;">Más info</a>
              			<a href="{{route('comunidad_raiz')}}" class="btn btn-lg  btn-outline-light" style="width: 100%;background-color:rgb(198, 98, 103); color: rgb(210, 238, 229) ;">Quiero formar parte</a>
          			</div>
        		</div>
      		</div>

      		<div class="col-sm-4">
        		<div class="card">
          			<div class="card-body">
            			<h1 class="card-title text-center" id="card-index">TALLERES</h1>
            			<p class="card-text text-center" style="font-size: 22px;"><strong>Conocé nuestro calendario y a quienes dan los talleres. Tenemos diferentes horarios y días.</strong></p>
						<a href="{{route('talleres')}}" class="btn btn-lg" style="width: 100%;background-color:rgb(198, 98, 103); color: rgb(210, 238, 229) ;">Más info</a>
          			</div>
        		</div>
      		</div>

      		<div class="col-sm-4">
        		<div class="card ind">
          			<div class="card-body">
            			<h1 class="card-title text-center" id="card-index">TIENDA</h1>
            			<p class="card-text text-center" style="font-size: 26px;"><strong>Visita nuestro catálogo, y enterate de nuestras ferias.</strong></p>
            			<a href="{{route('tienda.index')}}" class="btn btn-lg btn-outline-light" style="width: 100%;background-color:rgb(198, 98, 103); color: rgb(210, 238, 229) ;">Más info</a>
          			</div>
        		</div>
			</div>

    	</div>


		<div class="row mt-4">

      		<div class="col-sm-4">
        		<div class="card">
          			<div class="card-body">
           				<h1 class="card-title text-center" id="card-index">BANCO DE SEMILLAS</h1>
            			<p class="card-text text-center" style="font-size: 22px;"><strong>Conocé nuestro calendario y a quienes dan los talleres. Tenemos diferentes horarios y días.</strong></p>
            			<a href="#" class="btn btn-lg" style="width: 100%;background-color:rgb(198, 98, 103); color: rgb(210, 238, 229) ;">Más info</a>
          			</div>
        		</div>
      		</div>

      		<div class="col-sm-4">
        		<div class="card ind">
          			<div class="card-body">
            			<h1 class="card-title text-center" id="card-index">BIBLIOTECA</h1>
            			<p class="card-text text-center" style="font-size: 26px;"><strong>Podes ver los libros y textos que tenemos disponibles.</strong></p>
            			<a href="#" class="btn btn-lg btn-outline-light" style="width: 100%;background-color:rgb(198, 98, 103); color: rgb(210, 238, 229) ;">¡Quiero verlos!</a>
          			</div>
        		</div>
      		</div>

      		<div class="col-sm-4">
        		<div class="card">
          			<div class="card-body">
            			<h1 class="card-title text-center" id="card-index">LUDOTECA</h1>
            			<p class="card-text text-center" style="font-size: 22px;"><strong>Tenemos de todo para entretenernos.</strong></p>
            			<a href="#" class="btn btn-lg" style="width: 100%;background-color:rgb(198, 98, 103); color: rgb(210, 238, 229) ;">Ir</a>
          			</div>
        		</div>
      		</div>

    	</div>
  	</div>





<!-- Mapa -->
<!-- Mapa -->
<!-- Mapa -->
<!-- Mapa -->
<div class="text-center card-index my-5" id="card-index">
	<h3 class="text-center ">VISITÁ casaRAÍZ</h3>
	<p class="text-center">UBICACIÓN:</p>
</div>

<div class="container">
	<div class="row">
    	<div class="col-sm-3"></div>
		<div class="col-sm-6 video-responsive">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3277.8817691279846!2d-55.675979299999995!3d-34.758570999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x959ff7fd5f96edad%3A0xf0405d8059308a42!2sCasa%20Ra%C3%ADz!5e0!3m2!1ses-419!2suy!4v1659571699923!5m2!1ses-419!2suy"
			allowfullscreen="" loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
        
		<div class="col-sm-3"></div>

    </div>
</div>




{{--
<!-- LA FLORESTA ES CULTURA -->
<!-- LA FLORESTA ES CULTURA -->
<!-- LA FLORESTA ES CULTURA -->
<!-- LA FLORESTA ES CULTURA -->
<div class="container my-5">
    <div class="row my-5">
      	<div class="col-sm">
        	<div class="card">
          		<div class="card-body">
            		<h4 class="text-center h5">Conocé nuestra red de cultura local.</h4>
					<button type="button" class="btn btn-primary btn-lg btn-block" style="background-color:rgb(198, 98, 103); color: aquamarine ; color: brown; font-size:33px">
						LA FLORESTA ES CULTURA
					</button>
          		</div>
        	</div>
    	</div>
	</div>
</div>
--}}


<!-- Grilla de eventos destacados -->
<!-- Grilla de eventos destacados -->
<!-- Grilla de eventos destacados -->
<!-- Grilla de eventos destacados -->
<div class="container my-5">
    
    <div class="row">
    	<div class="col-md-6 mb-5">
			<h3 class="text-center h3">Eventos destacados</h3>
            <hr class="mb-3 mx-5">
			@foreach ($eventos as $evento)
        	<div class="card mb-4">
				<!--las 3 siguientes lineas habilitan o deshabilitan las imagenes-->    {{----}}
				{{--@if (count($t->multimedias))
				<img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="...">
				@endif--}}
				<div class="card-body">
					<p class="card-text mb-0">{{$evento->dia_de_semana}} {{$evento->dia}} de {{$evento->mes}} de {{ $evento->anio}}</p>
					{{--<p>{{$evento->fecha}}</p>--}}
					<small class="card-text mt-0">De {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</small>
					<a href="{{route('eventos.show', $evento)}}" class="mt-2">
						<h5 class="card-title text-dark">{{$evento->nombre}}</h5>
					</a>
					{{--<small class="card-text">A cargo de {{$evento->responsable}}</small>--}}
	
					<div class="d-flex justify-content-between align-items-center mb-2">
						@if($evento->costo_de_inscripcion == 0)
						    <div class="card-text"><small>Entrada </small> <span class="h5">GRATIS</span></div>
						@else
                            <div class="card-text"><small>Entrada </small> <span class="h5">${{$evento->costo_de_inscripcion}}</span></div>
                        @endif
						{{--<div class="card-text">
                            <small>Entrada </small>
                            @if ($evento->costo_de_inscripcion == 0)
                                <span class="h5">Gratis</span>
                            @else
                                <span class="h5">${{$evento->costo_de_inscripcion}}</span>
                            @endif
                        </div>--}}
                            
						<small class="text-dark">{{$evento->cupos_totales}} cupos</small>
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
            <hr class="mb-3 mx-5">
			@foreach ($talleres as $taller)
			
        	<div class="card mb-4">
				<!--las 3 siguientes lineas habilitan o deshabilitan las imagenes-->    {{----}}
				{{--@if (count($taller->multimedias))
				<img src="{{$taller->multimedias->last()->url}}" class="card-img-top" alt="...">
				@endif--}}
				<div class="card-body">
					<p class="card-text">{{$taller->dia_de_semana}} de {{$taller->hora_de_inicio}} a {{$taller->hora_de_fin}}hs.</p>
					<a href="{{route('eventos.show', $taller)}}" class="mt-2">
						<h5 class="card-title text-dark">{{$taller->nombre}}</h5>
					</a>
					<small class="card-text">A cargo de {{$taller->responsable}}</small>
	
					<div class="d-flex justify-content-between align-items-center mb-2">
                        @if($taller->costo_de_inscripcion == 0)
						    <div class="card-text"><small>Inscripción</small> <span class="h5">sin costo</span></div>
						@else
                            <div class="card-text"><small>Inscripción</small> <span class="h5">${{$taller->costo_de_inscripcion}}</span></div>
                        @endif
                        <small class="text-dark">{{$taller->cupos_totales}} cupos</small>
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




@endsection