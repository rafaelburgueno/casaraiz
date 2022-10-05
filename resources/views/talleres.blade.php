@extends('layouts.plantilla')

@section('title', 'Talleres')
@section('meta-description', 'metadescripción de la pagina Talleres')

@section('content')

<!-- social -->
@include('partials.social')

<!-- Imagen apaisada con logo -->
<div>
	<img src="{{asset('/storage/img/nav.10.png')}}" class="d-block w-100" alt="...">
</div>

<div class="text-center my-4 ">
    <h1 id="in" style="background-image: linear-gradient(to right,  rgb(174, 94, 101), rgb(246, 142, 99), rgb(174, 94, 101));" class="text-center pt-2">TALLERES</h1>
</div>


<div class="container">

    <div class="card-columns talleres">
        
        @foreach ($talleres as $t) 
        <div class="px-3 pb-5">
            <div class="card m-0">
                {{-- las 3 siguientes lineas habilitan o deshabilitan las imagenes --}}    {{----}}
                @if (count($t->multimedias) && $t->multimedias->last()->imagen_con_info)
                    {{--<a href="{{route('eventos.show', $t)}}" class="">--}}
                        <img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="{{$t->nombre}}. {{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.">
                    {{--</a>--}}
                @else
                    @if (count($t->multimedias))
                        {{--<a href="{{route('eventos.show', $t)}}" class="">--}}
                            <img src="{{$t->multimedias->last()->url}}" class="card-img-top" alt="{{$t->nombre}}. {{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.">
                        {{--</a>--}}
                    @endif
                
                    <div class="card-body">
                    
                        <p class="card-text mb-0">{{$t->dia_de_semana}} de {{$t->hora_de_inicio}} a {{$t->hora_de_fin}}hs.</p>
                        @if ($t->tiene_extenciones)
                            @foreach ($t->horarios_adicionales() as $adicional) 
                                @if($adicional->activo)
                                    <p class="card-text pt-0 my-0">{{$adicional->dia_de_semana}} de {{$adicional->hora_de_inicio}} a {{$adicional->hora_de_fin}}hs.</p>
                                @endif
                            @endforeach
                        @endif

                        {{--<a href="{{route('eventos.show', $t)}}" class="mt-2">--}}
                            <h5 class="card-title">{{$t->nombre}}</h5>
                        {{--</a>--}}
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
                    <button class="btn btn-tarjetas" {{--style="background-color: rgb(220, 43, 20); color: white;"--}}
                        data-toggle="modal" data-target="#inscribirme-{{$t->id}}" id="contactobtn-{{$t->id}}">
                        Inscribirme
                    </button>
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
                        <form action="{{route('inscripciones.store')}}" method="POST" onsubmit="return validateForm({{$t->id}})" class="was-validatedd">
                            <div class="modal-body">


                                @csrf
                                @method('POST')
                                <div class="form-row">
                                    <!-- input oculto con la informacion $t->id -->
                                    <input type="hidden" name="id_evento" value="{{$t->id}}">

                                    <!-- Input nombre{{$t->id}} -->
                                    <div class="form-group col-sm-6">
                                        <label for="nombre{{$t->id}}">Nombre: </label>
                                        <input required type="text" class="form-control" id="nombre{{$t->id}}" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
                                        @error('nombre')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!--Input apellido{{$t->id}} -->
                                    <div class="form-group col-sm-6">
                                        <label for="apellido{{$t->id}}">Apellido: </label>
                                        <input required type="text" class="form-control" id="apellido{{$t->id}}" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
                                        @error('apellido')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!--Input correo{{$t->id}} -->
                                <div class="form-group ">
                                    <label for="correo{{$t->id}}">Correo: </label>
                                    <input required type="email" class="form-control" id="correo{{$t->id}}" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
                                    @error('correo')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form row">
                                    <!--Input documento{{$t->id}} -->
                                    <div class="form-group col-sm-6">
                                        <label for="documento{{$t->id}}">Documento: </label>
                                        <input required type="number" min="1111111" max="999999999" class="form-control" id="documento{{$t->id}}" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
                                    </div>

                                    <!--Input telefono{{$t->id}} -->
                                    <div class="form-group col-sm-6">
                                        <label for="telefono{{$t->id}}">Celular: </label>
                                        <input required type="number" min="1111111" class="form-control" id="telefono{{$t->id}}" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
                                        @error('telefono')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!--Input medio_de_pago{{$t->id}} -->
                                <div class="form-group">
                                    <label for="">Medio de pago: </label>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$t->id}}" value="efectivo">
                                        <label class="form-check-label" for="efectivo-{{$t->id}}">Efectivo</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$t->id}}" value="midinero">
                                        <label class="form-check-label" for="midinero-{{$t->id}}">MiDinero</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$t->id}}" value="prex">
                                        <label class="form-check-label" for="prex-{{$t->id}}">Prex</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$t->id}}" value="canje/sorteo">
                                        <label class="form-check-label" for="canje/sorteo-{{$t->id}}">Canje/Sorteo</label>
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

        </div>

        @endforeach

    </div>

</div>

<!-- Botones de paginacion -->
{{ $talleres->links('pagination::bootstrap-4') }}


@endsection