@extends('layouts.plantilla')

@section('title', 'Editar ' . $evento->nombre)
@section('meta-description', 'metadescripción de la pagina de creacion de eventos')


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">EDITAR EVENTO</h1>
</div>


<div class="container">   

    <div class="row mb-5 mt-5">
        <div class="col-md-12">

            <form class="" action="{{route('eventos.update', $evento)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col col-md-6">
   
                        {{--<div class="form-group mb-3">
                            <label for="tipo">Tipo de evento</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="evento">evento</option>
                                <option value="taller">taller</option>
                                <option value="curso">curso</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>--}}

                        <div class="form-group mb-3">
                            <label for="tipo">Tipo de evento</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="..." value="{{old('tipo', $evento->tipo)}}">
                            @error('tipo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre', $evento->nombre)}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="lugar">Lugar</label>
                            <input type="text" class="form-control" id="lugar" name="lugar" placeholder="..." value="{{old('lugar', $evento->lugar)}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="relevancia">Relevancia</label>
                            <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{old('relevancia', $evento->relevancia)}}" min="1">
                        </div>

                        <div class="form-group mb-3">
                            <label for="responsable">Responsable</label>
                            <input type="text" class="form-control" id="responsable" name="responsable" placeholder="..." value="{{old('responsable', $evento->responsable)}}">
                            @error('responsable')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion', $evento->descripcion)}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                
                    <div class="col-md-6">

                        <!--checkbox para indicar la frecuencia del evento o taller-->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="frecuencia_semanal" name="frecuencia_semanal" value="1" @checked(old('frecuencia_semanal', $evento->frecuencia_semanal))>
                            <label class="form-check-label" for="frecuencia_semanal">Frecuencia semanal</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="frecuencia_mensual" name="frecuencia_mensual" value="1" @checked(old('frecuencia_mensual', $evento->frecuencia_mensual))>
                            <label class="form-check-label" for="frecuencia_mensual">Frecuencia mensual</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="frecuencia_anual" name="frecuencia_anual" value="1" @checked(old('frecuencia_anual', $evento->frecuencia_anual))>
                            <label class="form-check-label" for="frecuencia_anual">Frecuencia anual</label>
                        </div>

                        <div class="form-group mb-3">
                            <label for="cupos_totales">Cupos</label>
                            <input type="number" class="form-control" id="cupos_totales" name="cupos_totales" placeholder="..." value="{{old('cupos_totales', $evento->cupos_totales)}}" min="1">
                        </div>

                        <!--input para el costo de inscripcion-->
                        <div class="form-group mb-3">
                            <label for="costo_de_inscripcion">Costo de inscripcion</label>
                            <input type="number" class="form-control" id="costo_de_inscripcion" name="costo_de_inscripcion" placeholder="..." value="{{old('costo_de_inscripcion', $evento->costo_de_inscripcion)}}" min="0">
                        </div>

                        <div class="row">
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha', $evento->fecha)}}">
                                </div>

                            </div>

                            <div class="col col-md-6">

                                <!--selecciona el dia de la semana-->
                                <div class="form-group mb-3">
                                    <label for="dia_de_semana">Dia de la semana</label>
                                    <select class="form-control" id="dia_de_semana" name="dia_de_semana">
                                        <option value="Lunes" @selected((old('dia_de_semana') == "Lunes") || $evento->dia_de_semana == "Lunes" )>Lunes</option>
                                        <option value="Martes" @selected((old('dia_de_semana') == "Martes") || $evento->dia_de_semana == "Martes" )>Martes</option>
                                        <option value="Miércoles" @selected((old('dia_de_semana') == "Miércoles") || $evento->dia_de_semana == "Miércoles" )>Miércoles</option>
                                        <option value="Jueves" @selected((old('dia_de_semana') == "Jueves") || $evento->dia_de_semana == "Jueves" )>Jueves</option>
                                        <option value="Viernes" @selected((old('dia_de_semana') == "Viernes") || $evento->dia_de_semana == "Viernes" )>Viernes</option>
                                        <option value="Sábado" @selected((old('dia_de_semana') == "Sábado") || $evento->dia_de_semana == "Sábado" )>Sábado</option>
                                        <option value="Domingo" @selected((old('dia_de_semana') == "Domingo") || $evento->dia_de_semana == "Domingo" )>Domingo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="hora_de_inicio">Hora de inicio</label>
                                    <input type="time" class="form-control" id="hora_de_inicio" name="hora_de_inicio" value="{{old('hora_de_inicio', $evento->hora_de_inicio)}}">
                                </div>

                            </div>
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="hora_de_fin">Hora de fin</label>
                                    <input type="time" class="form-control" id="hora_de_fin" name="hora_de_fin" value="{{old('hora_de_fin', $evento->hora_de_fin)}}">
                                </div>

                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                            @error('imagen')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $evento->activo))>
                            <label class="form-check-label" for="activo">Publicar</label>
                        </div>
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Actualizar evento</button>
            </form>

            <form action="{{ route('eventos.destroy', $evento) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger my-1">Eliminar Evento</button>
            </form>

        </div>
    </div>



</div>
    


@endsection