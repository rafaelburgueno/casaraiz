@extends('layouts.plantilla')

@section('title', 'Agenda de eventos')
@section('meta-description', 'metadescripción de la pagina Agenda')

@section('content')

<div class="text-center my-4">
    <h1 id="in" style="background-image: linear-gradient(to right,  rgb(174, 94, 101), rgb(246, 142, 99), rgb(174, 94, 101));" class="text-center pt-2">AGENDA</h1>
</div>


<!-- Carousel -->
@include('partials.carousel')


<div class="container">

    <div class="row mb-5 mt-3">
        
        {{-- CALENDAR --}}
        <!-- CALENDAR -->
        <div class="col-md-6 mb-3">
            @include('partials.calendar')
        </div>
        <!-- CALENDAR -->


        
        <!-- LISTA DESPLEGABLE DE EVENTOS -->
        <!-- LISTA DESPLEGABLE DE EVENTOS -->
        <!-- LISTA DESPLEGABLE DE EVENTOS -->
        <div class="col-md-6 mb-5">
            <div class="accordion" id="accordionEventos">

                @foreach ($eventos as $evento)

                <div class="card m-1 mb-3">
                    <div class="accordion-header" id="heading{{$evento->id}}">
                        <h2 class="p-3">
                            <div class=" text-left" type="button" data-toggle="collapse" data-target="#collapse{{$evento->id}}" aria-expanded="true" aria-controls="collapse{{$evento->id}}">
                                @if(!$evento->activo)
                                <span class="float-right m-1 badge badge-danger" style="font-size: 10px">El evento no es público</span>
                                @endif
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
                            
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                {{--<a href="{{route('eventos.show', $evento)}}" class="">
                                    <button class="btn btn-outline-secondary btn-sm mb-3">Ver...</button>
                                    
                                </a>--}}
                                <p class=""><small>Espacio: {{ Str::ucfirst($evento->lugar) }}</small></p>
                            
                                <button class="btn btn-tarjetas" {{--style="background-color: rgb(220, 43, 20); color: white;"--}}
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
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('inscripciones.store')}}" method="POST" onsubmit="return validateForm({{$evento->id}})" class="was-validatedd">
                                <div class="modal-body">
                                    @csrf
                                    @method('POST')

                                    <div class="form-row">
                                        <!-- input oculto con la informacion $evento->id -->
                                        <input type="hidden" name="id_evento" value="{{$evento->id}}">

                                        <!-- Input nombre{{$evento->id}} -->
                                        <div class="form-group col-sm-6">
                                            <label for="nombre">Nombre: </label>
                                            <input required type="text" class="form-control" id="nombre{{$evento->id}}" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
                                            @error('nombre')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input apellido{{$evento->id}} -->
                                        <div class="form-group col-sm-6">
                                            <label for="apellido{{$evento->id}}">Apellido: </label>
                                            <input required type="text" class="form-control" id="apellido{{$evento->id}}" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
                                            @error('apellido')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--Input correo{{$evento->id}} -->
                                    <div class="form-group ">
                                        <label for="correo{{$evento->id}}">Correo: </label>
                                        <input required type="email" class="form-control" id="correo{{$evento->id}}" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
                                        @error('correo')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form row">
                                        <!--Input documento{{$evento->id}} -->
                                        <div class="form-group col-sm-6">
                                            <label for="documento{{$evento->id}}">Documento: </label>
                                            <input required type="text" min="1111111" max="999999999" class="form-control" id="documento{{$evento->id}}" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
                                        
                                        </div>

                                        <!--Input telefono{{$evento->id}} -->
                                        <div class="form-group col-sm-6">
                                            <label for="telefono{{$evento->id}}">Celular: </label>
                                            <input required type="number" min="1111111" class="form-control" id="telefono{{$evento->id}}" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
                                            @error('telefono')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!--Input medio_De_pago{{$evento->id}} -->
                                    <div class="form-group">
                                        <label for="comentario">Medio de pago: </label>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$evento->id}}" value="efectivo">
                                            <label class="form-check-label" for="efectivo-{{$evento->id}}">Efectivo</label>
                                        </div>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$evento->id}}" value="midinero">
                                            <label class="form-check-label" for="midinero-{{$evento->id}}">MiDinero</label>
                                        </div>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$evento->id}}" value="prex">
                                            <label class="form-check-label" for="prex-{{$evento->id}}">Prex</label>
                                        </div>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$evento->id}}" value="canje/sorteo">
                                            <label class="form-check-label" for="canje/sorteo-{{$evento->id}}">Canje/Sorteo</label>
                                        </div>
                                    </div>

                                    <!--Input recibir_novedades -->
                                    <div class="form-group pl-3">
                                        <div class="form check pl-1">
                                            <input type="checkbox" class="form-check-input" name="recibir_novedades" @checked(old('recibir_novedades')) value="1" id="check" checked>
                                            <label class="form-check-label" for="check">Quiero recibir las novedades</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-block btn-tarjetas" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--  ----------FIN DEL FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->

                @endforeach

            </div>
        </div>

        
        
    
        
    </div>


    {{--<div class="d-flex flex-wrap flex-row">
    
        @foreach ($eventos as $evento) 
        <div class="col-md-4">
            <div class="card mb-4">
                <!-- las 3 siguientes lineas habilitan o deshabilitan las imagenes -->
                @if (count($evento->multimedias) && $evento->multimedias->last()->imagen_con_info)
                    <a href="{{route('eventos.show', $evento)}}" class="">
                        <img src="{{$evento->multimedias->last()->url}}" class="card-img-top" alt="{{$evento->nombre}}. {{$evento->dia_de_semana}} de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.">
                    </a>
                @else
                    @if (count($evento->multimedias))
                        <a href="{{route('eventos.show', $evento)}}" class="">
                            <img src="{{$evento->multimedias->last()->url}}" class="card-img-top" alt="{{$evento->nombre}}. {{$evento->dia_de_semana}} de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.">
                        </a>
                    @endif
                
                    <div class="card-body">
                    
                        
                        <div class="text-muted fw-light">
                            <small>{{$evento->dia_de_semana}} {{$evento->dia}} de {{$evento->mes}} de {{$evento->anio}}, {{ $evento->hora_de_inicio }}hs a {{ $evento->hora_de_fin }}hs</small>
                          </div>
                        <a href="{{route('eventos.show', $evento)}}" class="mt-2">
                            <h5 class="card-title text-dark">{{Str::ucfirst($evento->nombre)}}</h5>
                        </a>
                        <small>{{ Str::ucfirst($evento->tipo) }} a cargo de {{$evento->responsable}}</small><br>
                        @if($evento->lugar)
                        <small>Espacio: {{ Str::ucfirst($evento->lugar) }}</small>
                        @endif
    
                        @if(!$evento->activo)
                            <p class=""><small class="p-1 text-light bg-danger">Este evento no está activo.</small></p>
                        @endif
    
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            @if($evento->costo_de_inscripcion == 0)
                                <div class="card-text"><small>Inscripción</small> <span class="h5">sin costo</span></div>
                            @else
                                <div class="card-text"><small>Inscripción</small> <span class="h4">${{$evento->costo_de_inscripcion}}</span></div>
                            @endif
                            <small class="">{{$evento->cupos_totales}} cupos</small>
                        </div>
    
                        <p class="card-text">{{Str::limit($evento->descripcion, 100)}}</p>
    
                        
                    
                    </div>
                @endif
                <div class="p-2 d-flex justify-content-end">
                    <button class="btn btn-info" style="background-color: rgb(220, 43, 20); color: white;"
                        data-toggle="modal" data-target="#inscribirme-{{$evento->id}}" id="contactobtn-{{$evento->id}}">
                        Inscribirme
                    </button>
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
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('inscripciones.store')}}" method="POST">
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
                                <label for="">Medio de pago: </label>
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
    
        
    
    </div>--}}


    {{--<!-- Botones de paginacion -->
    <div class="d-flex justify-content-center">
        {{ $eventos->links('pagination::bootstrap-4') }}
    </div>--}}


</div>


@endsection