@extends('layouts.plantilla')

@section('title', 'Agenda de eventos')
@section('meta-description', 'metadescripción de la pagina de Eventos')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">EVENTOS</h1>
</div>


<div class="container">
    
        
    @if(Auth::check() && Auth::user()->rol == 'administrador')
    <div>
        <a class="btn btn-outline-secondary my-3" href="{{route('eventos.create')}}">Crear Evento</a>
    </div>
    @endif
    

    <!-- Tabla de Eventos -->
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

<div class="pb-3" style="overflow-x: scroll;">
    <table id="table_id" class="display {{--table table-striped table-hover table-sm--}}">
        <thead>
            <tr>
                <th>id</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Nombre</th>
                <th>Activo?</th>
                {{--<th>Extenciones?</th>--}}
                <th>Cupos</th>
                <th>Administrar</th>

                {{--<th>Responsable</th>
                <th>activo</th>
                <th>Teléfono</th>--}}
                
            </tr>
        </thead>
        <tbody>
        
            @foreach ($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->tipo }}</td>
                    <td>{{ $evento->created_at->format('d/m/Y') }}</td>
                    <td>
                        {{ substr($evento->dia_de_semana, 0, 10) }} de {{ $evento->hora_de_inicio }} a {{ $evento->hora_de_fin }}hs.
                        @if($evento->tiene_extenciones)
                            @foreach ($evento->horarios_adicionales() as $adicional) 
                                @if($adicional->activo)
                                     <br>{{ substr($adicional->dia_de_semana, 0, 10) }} de {{$adicional->hora_de_inicio}} a {{$adicional->hora_de_fin}}hs.
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $evento->nombre }}</td>

                    <td>
                        @if($evento->activo)
                            SI
                        @else
                            NO
                        @endif
                    </td>
                    {{--<td>{{ $evento->tiene_extenciones }}</td>--}}
                    <td>{{ $evento->cupos_disponibles }}</td>
                    <td>
                        <a href="{{route('eventos.show', $evento)}}" class="btn btn-sm btn-outline-secondary ">Ver</a>
                        <a href="{{route('eventos.edit', $evento)}}" class="btn btn-sm btn-outline-secondary ">Editar</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    
    {{--<div class="row mb-5 mt-3">--}}
        {{--
        <div class="col-md-12 mb-5">
            <div class="accordion" id="accordionEventos">

                @foreach ($eventos as $evento)

                <div class="card m-1 mb-3">
                    <div class="accordion-header" id="heading{{$evento->id}}">
                        <h2 class="p-3">
                            <div class=" text-left" type="button" data-toggle="collapse" data-target="#collapse{{$evento->id}}" aria-expanded="true" aria-controls="collapse{{$evento->id}}">
                                @if(!$evento->activo)
                                <span class="float-right m-1 badge badge-danger" style="font-size:10px;">El evento no es público</span>
                                @endif
                                <small class="h6">Id: {{$evento->id}}</small>
                                <p class="card-text h6">{{$evento->dia_de_semana}} {{$evento->dia}} de {{$evento->mes}} de {{$evento->anio}}, de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</p>
                                <p class="card-text mt-2 mb-0 h5"><strong>{{$evento->nombre}}</strong></p>
                            </div>
                        </h2>
                    </div>
                    
                    <div id="collapse{{$evento->id}}" class="collapse" aria-labelledby="heading{{$evento->id}}" data-parent="#accordionEventos">
                        
                        <div class="card-body py-0">
                            <p class="">{{$evento->descripcion}}</p>
                            <p class="card-text"><small>Inscripcion </small>
                                @if ($evento->costo_de_inscripcion == 0)
                                    <span class="">Gratuita</span>
                                @else
                                    <strong> ${{$evento->costo_de_inscripcion}}</strong>
                                @endif
                            </p>
                            <p class=""><small>{{ Str::ucfirst($evento->tipo) }} a cargo de {{$evento->responsable}}</small></p>
                            <p class=""><small>Espacio: {{ Str::ucfirst($evento->espacio) }}</small></p>
                            
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <a href="{{route('eventos.show', $evento)}}" class="">
                                    <button class="btn btn-outline-secondary btn-sm mb-3">Ver...</button>        
                                </a>
                            
                            </div>

                        </div>

                    </div>
                </div>

                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                
                <!--  ----------FIN DEL FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->

                @endforeach

            </div>
        </div>
        --}}
        
        <!-- Botones de paginacion -->
        {{--<div class="d-flex justify-content-center">
            {{ $eventos->links('pagination::bootstrap-4') }}
        </div>--}}


        
        {{--{{ $eventos->links() }}--}}

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
        
    {{--</div>--}}

      


</div>


@endsection