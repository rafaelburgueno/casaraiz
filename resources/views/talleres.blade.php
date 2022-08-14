@extends('layouts.plantilla')

@section('title', 'Talleres')
@section('meta-description', 'metadescripción de la pagina Talleres')

@section('content')


<!-- Imagen apaisada con logo -->
<div>
	<img src="{{asset('/storage/img/nav.10.png')}}" class="d-block w-100" alt="...">
</div>

<div class="my-2">
    <h1 id="in" class="text-center pt-2">TALLERES</h1>
</div>


@if(Auth::check() && Auth::user()->rol == 'administrador')
    <div class="container mb-2">
        <a class="btn btn-outline-secondary" href="{{route('eventos.create')}}">Crear taller o evento</a>
    </div>
@endif



<div class="d-flex flex-wrap flex-row">
    
    @foreach ($talleres as $t)
    <div class="col-md-3">
        <div class="card mb-2">
            {{-- las 3 siguientes lineas habilitan o deshabilitan las imagenes --}}    {{----}}
            @if (count($t->multimedias))
            <img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <p class="card-text">{{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.</p>
                <a href="{{route('eventos.show', $t)}}" class="mt-2">
                    <h5 class="card-title text-dark">{{$t->nombre}}</h5>
                </a>
                <small class="card-text">A cargo de {{$t->responsable}}</small>

                @if(!$t->activo)
                    <p class=""><small class="p-1 text-light bg-danger">Este taller no está activo.</small></p>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-2">
                    @if($t->costo_de_inscripcion == 0)
                        <div class="card-text"><small>Inscripción</small> <span class="h5">sin costo</span></div>
                    @else
                        <div class="card-text"><small>Inscripción</small> <span class="h4">${{$t->costo_de_inscripcion}}</span></div>
                    @endif
                    <small class="">{{$t->cupos_totales}} cupos</small>
                </div>

                <p class="card-text">{{Str::limit($t->descripcion, 100)}}</p>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <a href="{{route('eventos.show', $t)}}" class=""><small>más info...</small></a>
                </div>
                    
            </div>
        </div>
    </div>
    @endforeach

    

</div>

<!-- Botones de paginacion -->
{{ $talleres->links('pagination::bootstrap-4') }}


<hr class="my-5">


<div class="d-flex flex-wrap flex-row ">

    @foreach ($talleres as $t)
    <div class="col-md-4">
        <div class="card d-flex flex-column justify-content-between p-1">
            <div>
                @if (count($t->multimedias))
                <img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="{{$t->descripcion}}">
                @endif
                <h4 class="text-center">{{$t->nombre}}</h4>
                <p class="">{{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.</p>
                <p>{{$t->descripcion}}</p>
                <small class="card-text">A cargo de {{$t->responsable}}</small>
                <small class="text-muted">{{$t->fecha}}</small>
            </div>
            <div class="p-1">
                <button class="btn btn-info align-items-center" style="background-color: crimson; color: white;">Saber más...</button>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Botones de paginacion -->
    {{ $talleres->links('pagination::bootstrap-4') }}

</div>



@endsection