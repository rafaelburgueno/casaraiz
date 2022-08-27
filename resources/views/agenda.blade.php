@extends('layouts.plantilla')

@section('title', 'Agenda de eventos')
@section('meta-description', 'metadescripción de la pagina Agenda')

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
                                <p class="card-text h6">{{$evento->dia_de_semana}} {{$evento->dia}} de {{$evento->mes}} de {{$evento->anio}}, de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</p>
                                <p class="card-text mt-2 mb-0 h5"><strong>{{$evento->nombre}}</strong></p>
                            </div>
                        </h2>
                    </div>
                    
                    <div id="collapse{{$evento->id}}" class="collapse" aria-labelledby="heading{{$evento->id}}" data-parent="#accordionEventos">
                        {{--<hr>--}}
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
                                    {{--<span class="text-dark">ver...</span>--}}
                                </a>
                            
                                <button class="btn btn-info" style="background-color: rgb(220, 43, 20); color: white;"
                                    data-toggle="modal" data-target="#inscribirme-{{$evento->id}}" id="contactobtn-{{$evento->id}}">
                                    Inscribirme
                                </button>
                            </div>

                        </div>

                    </div>
                </div>

                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
                <div class="modal fade" id="inscribirme-{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="formulario_de_inscripcion" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formulario_de_inscripcion">Completa tus datos</h5>
                                {{--<br><small>Inscripción al taller {{$evento->nombre}}</small>--}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('inscripcion')}}" method="POST">
                                <div class="modal-body">


                                    @csrf
                                    @method('POST')
                                    <div class="form-row">
                                        <!-- input oculto con la informacion $evento->id -->
                                        <input type="hidden" name="id_evento" value="{{$evento->id}}">

                                        <div class="form-group col-sm-6">
                                            <label for="nombre">Nombre: </label>
                                            <input required type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
                                            @error('nombre')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="apellido">Apellido: </label>
                                            <input required type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
                                            @error('apellido')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="correo">Correo: </label>
                                        <input required type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
                                        @error('correo')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form row">
                                        <div class="form-group col-sm-6">
                                            <label for="documento">Documento: </label>
                                            <input required type="text" class="form-control" id="documento" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
                                        
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="telefono">Celular: </label>
                                            <input required type="tel" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
                                            @error('telefono')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="comentario">Medio de pago: </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$evento->id}}" value="efectivo">
                                            <label class="form-check-label" for="efectivo-{{$evento->id}}">Efectivo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$evento->id}}" value="midinero">
                                            <label class="form-check-label" for="midinero-{{$evento->id}}">MiDinero</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$evento->id}}" value="prex">
                                            <label class="form-check-label" for="prex-{{$evento->id}}">Prex</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$evento->id}}" value="canje/sorteo">
                                            <label class="form-check-label" for="canje/sorteo-{{$evento->id}}">Canje/Sorteo</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-block" style="background-color: coral; color: #e9e2e2;" id="enviar">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--  ----------FIN DEL FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->

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