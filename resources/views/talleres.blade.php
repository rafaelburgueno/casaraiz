@extends('layouts.plantilla')

@section('title', 'Talleres')
@section('meta-description', 'metadescripción de la pagina Talleres')

@section('content')


<!-- Imagen apaisada con logo -->
<div>
	<img src="{{asset('/storage/img/nav.10.png')}}" class="d-block w-100" alt="...">
</div>

<div class="text-center py-4 my-0">
    <h1 id="in" class="text-center">TALLERES</h1>
</div>


@if(Auth::check() && Auth::user()->rol == 'administrador')
    <div class="container mb-2">
        <a class="btn btn-outline-secondary" href="{{route('eventos.create')}}">Crear taller o evento</a>
    </div>
@endif



<div class="d-flex flex-wrap flex-row">
    
    @foreach ($talleres as $t) 
    <div class="col-md-4">
        <div class="card mb-4">
            {{-- las 3 siguientes lineas habilitan o deshabilitan las imagenes --}}    {{----}}
            @if (count($t->multimedias) && $t->multimedias->last()->imagen_con_info)
                <a href="{{route('eventos.show', $t)}}" class="">
                    <img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="{{$t->nombre}}. {{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.">
                </a>
            @else
                @if (count($t->multimedias))
                    <a href="{{route('eventos.show', $t)}}" class="">
                        <img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="{{$t->nombre}}. {{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.">
                    </a>
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

                    {{--<div class="d-flex justify-content-between align-items-center mb-2">
                        <a href="{{route('eventos.show', $t)}}" class=""><small>más info...</small></a>
                    </div>--}}
                
                </div>
            @endif
            <div class="p-2 d-flex justify-content-end">
                <button class="btn btn-info" style="background-color: rgb(220, 43, 20); color: white;"
                    data-toggle="modal" data-target="#inscribirme-{{$t->id}}" id="contactobtn-{{$t->id}}">
                    Inscribirme
                </button>
            </div>
                    
        </div>
    </div>

    <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
    <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
    <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
    <!--  ----------FORMULARIO DE INSCRIPCIÓN -------- ------ ----- -->
    <div class="modal fade" id="inscribirme-{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="formulario_de_inscripcion" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formulario_de_inscripcion">Completa tus datos</h5>
                    {{--<br><small>Inscripción al taller {{$t->nombre}}</small>--}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('inscripcion')}}" method="POST">
                    <div class="modal-body">


                        @csrf
                        @method('POST')
                        <div class="form-row">
                            <!-- input oculto con la informacion $t->id -->
                            <input type="hidden" name="id_evento" value="{{$t->id}}">

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
                                <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$t->id}}" value="efectivo">
                                <label class="form-check-label" for="efectivo-{{$t->id}}">Efectivo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$t->id}}" value="midinero">
                                <label class="form-check-label" for="midinero-{{$t->id}}">MiDinero</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$t->id}}" value="prex">
                                <label class="form-check-label" for="prex-{{$t->id}}">Prex</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$t->id}}" value="canje/sorteo">
                                <label class="form-check-label" for="canje/sorteo-{{$t->id}}">Canje/Sorteo</label>
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

<!-- Botones de paginacion -->
{{ $talleres->links('pagination::bootstrap-4') }}


@endsection