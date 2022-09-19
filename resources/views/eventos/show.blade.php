@extends('layouts.plantilla')

@section('title', $evento->nombre)
@section('meta-description', $evento->descripcion)


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">{{ Str::ucfirst($evento->nombre) }}</h1>
</div>


<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                @if (count($evento->multimedias))
                <img src="{{$evento->multimedias->last()->url}}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <p class="card-text mb-0">{{$evento->dia_de_semana}} de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</p>
                    @if ($evento->tiene_extenciones)
                        @foreach ($evento->horarios_adicionales() as $adicional)
                            @if($adicional->activo)
                                <p class="card-text pt-0 my-0">{{$adicional->dia_de_semana}} de {{$adicional->hora_de_inicio}} a {{$adicional->hora_de_fin}}hs.</p>
                            @endif
                        @endforeach
                    @endif
                    {{-- <h5 class="card-title my-1 text-dark"><strong>{{$evento->nombre}}</strong></h5>--}}

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text"><small>Inscripcion </small>
                            @if ($evento->costo_de_inscripcion == 0)
                                <span class="">Gratuita</span>
                            @else
                                <strong> ${{$evento->costo_de_inscripcion}}</strong>
                            @endif
                        </p>
                        
                        <small class="">{{ $evento->cupos_totales }} cupos</p>
                    </div>
                    
                    
                    <p class="">{{ ucfirst($evento->tipo) }} a cargo de {{$evento->responsable}}</p>
                    
                    <p>Espacio: {{ $evento->lugar }}</p>

                    @if(!$evento->activo)
                        <div class="float-right m-0 p-0 pr-3"><span class="badge badge-danger">El evento no es público</span></div>
                    @endif
                    
                    @if (count($evento->categorias))
                        <p>Categoria: {{ $evento->categorias }}</p>
                    @endif
                    
                    <p class="h6">{{$evento->descripcion}}</p>

                    <div class="p-2 d-flex justify-content-end">
                        <button class="btn btn-info" style="background-color: rgb(220, 43, 20); color: white;"
                            data-toggle="modal" data-target="#inscribirme-{{$evento->id}}" id="contactobtn">
                            Inscribirme
                        </button>
                    </div>

                </div>
                
                {{-- Esta se mostrara solamente al administrador --}}
                @if(Auth::check() && Auth::user()->rol == 'administrador')
                <p class="mx-1">Creado: <small>{{$evento->created_at}}</small></p>
                <div class="d-flex justify-content-between align-items-center p-1">
                    <a href="{{route('eventos.index')}}" class="btn btn-outline-secondary ">< Volver</a>
                    <a href="{{route('eventos.edit', $evento)}}" class="btn btn-outline-secondary ">Editar ></a>
                </div>
                @endif
                
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
                                    <label for="comentario">Medio de pago: </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo" value="efectivo">
                                        <label class="form-check-label" for="efectivo">Efectivo</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero" value="midinero">
                                        <label class="form-check-label" for="midinero">MiDinero</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex" value="prex">
                                        <label class="form-check-label" for="prex">Prex</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo" value="canje/sorteo">
                                        <label class="form-check-label" for="canje/sorteo">Canje/Sorteo</label>
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


        </div>

        <div class="col-md-2"></div>

        
    </div>      
    

</div>
    


@endsection