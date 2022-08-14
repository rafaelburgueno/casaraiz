@extends('layouts.plantilla')

@section('title', 'Agenda de eventos')
@section('meta-description', 'metadescripción de la pagina de Eventos')


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">AGENDA</h1>
</div>


<div class="container">
    
        
    @if(Auth::check() && Auth::user()->rol == 'administrador')
    <div>
        <a class="btn btn-outline-secondary my-3" href="{{route('eventos.create')}}">Crear Evento</a>
    </div>
    @endif
    
    
    <div class="row mb-5 mt-3">

        <div class="col-md-12 mb-5">
            <div class="accordion" id="accordionEventos">

                @foreach ($eventos as $evento)

                <div class="card m-1 mb-3">
                    <div class="accordion-header" id="heading{{$evento->id}}">
                        <h2 class="p-3">
                            <div class=" text-left" type="button" data-toggle="collapse" data-target="#collapse{{$evento->id}}" aria-expanded="true" aria-controls="collapse{{$evento->id}}">
                                @if(!$evento->activo)
                                <span class="float-right m-1 badge badge-danger">El evento no es público</span>
                                @endif
                                <p class="card-text">{{$evento->dia_de_semana}} {{$evento->dia}} de {{$evento->mes}} de {{$evento->anio}}, de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</p>
                                <p class="card-text mt-3 h5"><strong>{{$evento->nombre}}</strong></p>
                            </div>
                        </h2>
                    </div>
                    
                    <div id="collapse{{$evento->id}}" class="collapse" aria-labelledby="heading{{$evento->id}}" data-parent="#accordionEventos">
                        <hr>
                        <div class="card-body">
                            <p class="">{{$evento->descripcion}}</p>
                            <p class="card-text"><small>Inscripcion </small>
                                @if ($evento->costo_de_inscripcion == 0)
                                    <span class="">Gratuita</span>
                                @else
                                    <strong> ${{$evento->costo_de_inscripcion}}</strong>
                                @endif
                            </p>
                            <p class=""><small>{{ $evento->tipo }} a cargo de {{$evento->responsable}}</small></p>
                            <p class=""><small>Espacio: {{ $evento->espacio }}</small></p>
                            
                            <a href="{{route('eventos.show', $evento)}}" class="mt-2">
                                <span class="text-dark">ver...</span>
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>

        
        <!-- Botones de paginacion -->
    {{--{{ $eventos->links('pagination::bootstrap-4') }}
    {{ $eventos->links() }}--}}

        {{--@foreach ($eventos as $evento)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                      <strong class="d-inline-block mb-3 text-dark h5 fw-bold text-decoration-underline text-capitalize">{{ $evento->nombre }}</strong>
                      <p>id: {{ $evento->id }}</p>
                    <p class="">A cargo de {{$evento->a_cargo_de()}}</p>
                      <div class="text-muted fw-light">
                        <small>{{ $evento->fecha }} -- {{ $evento->hora_de_inicio }}hs a {{ $evento->hora_de_fin }}hs</small>
                      </div>
                      <p class="card-text mb-auto">{{ $evento->descripcion }}</p>
                      <p>{{$evento->user}}</p>
                      <a href="{{route('eventos.show', $evento)}}" class="stretched-link text-secondary text-end">más...</a>
                    @if (count($evento->multimedias))
                        <p>{{$evento->multimedias[0]->url}}</p>
                        <img src="{{$evento->multimedias[0]->url}}" alt="">
                    @endif
                </div>
            
            </div>
        </div>
        @endforeach--}}
        
    </div>

      


</div>


@endsection