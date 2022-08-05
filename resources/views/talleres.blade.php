@extends('layouts.plantilla')

@section('title', 'Talleres')
@section('meta-description', 'metadescripción de la pagina Talleres')

@section('content')


@if(Auth::check() && Auth::user()->rol == 'administrador')
    <div class="container">
        <a class="btn" href="{{route('eventos.create')}}">Crear Evento</a>
    </div>
@endif


<div class="text-center"><br>
    <h1 id="in" class="text-center">TALLERES <img src="/storage/img/casaRaiz.tr.png" style="opacity:80% ;"></h1>
</div>




<div class="d-flex flex-wrap flex-row">
    
    @foreach ($talleres as $t)
    <div class="col-md-4">
        <div class="card mb-2 shadow-sm">
            <!--las 3 siguientes lineas habilitan o deshabilitan las imagenes-->    {{----}}
            @if (count($t->multimedias))
            <img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <p class="card-text">{{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.</p>
                <a href="{{route('eventos.show', $t)}}" class="mt-2">
                    <h5 class="card-title text-light">{{$t->nombre}}</h5>
                </a>
                <small class="card-text">A cargo de {{$t->responsable}}</small>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    @if($t->costo_de_inscripcion == 0)
                        <div class="card-text"><small>Inscripcion</small> <span class="h5">sin costo</span></div>
                    @else
                        <div class="card-text"><small>Inscripcion</small> <span class="h4">${{$t->costo_de_inscripcion}}</span></div>
                    @endif
                    <small class="text-light">{{$t->cupos_totales}} cupos</small>
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
{{ $talleres->links() }}


<br><br><br>


<div class="d-flex flex-wrap flex-row border border-5">

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
                <button class="btn btn-info align-items-center" style="background-color: crimson; color: white;">Leer más...</button>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Botones de paginacion -->
    {{ $talleres->links() }}

</div>





{{--<div>
    <h1>pagina /talleres</h1>

    @if (Auth::check())
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>--}}

@endsection