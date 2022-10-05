@extends('layouts.plantilla')

@section('title', 'Editar ' . $evento->nombre)
@section('meta-description', 'metadescripción de la pagina de creacion de eventos')


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">Id:{{$evento->id}} | {{$evento->nombre}}</h1>
</div>


<!-- -------------------------------------------------------------------------------- -->
<!-- Script necesarios para escribir la tabla de historial de inscripciones al evento -->
<!-- Script necesarios para escribir la tabla de historial de inscripciones al evento -->
<!-- -------------------------------------------------------------------------------- -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css')}}" />--}}
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
{{--<script type="text/javascript" src="{{ asset('/js/calendar.js') }}"></script>--}}

<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            order: [
                [1, 'desc']
            ]
        });
    } );
</script>




<!-- ---------------------------------------------------- -->
<!-- Tabla de historial de inscripciones al evento -->
<!-- Tabla de historial de inscripciones al evento -->
<!-- ---------------------------------------------------- -->
<div class="container">
    <div class="text-center my-4">
        <h2 id="in" class="text-center pt-2">Lista de inscripciones</h2>
    </div>
    <div class="pb-3" style="overflow-x: scroll;">
        <table id="table_id" class="display {{--table table-striped table-hover table-sm--}}">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    {{--<th>Inscripción</th>--}}
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>C.I.</th>
                    <th>Medio de pago</th>
                    {{--<th>Comentario</th>--}}
                    <th>Recibir novedades</th>
                    
                </tr>
            </thead>
            <tbody>
            
                @foreach ($evento->inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->id }}</td>
                        <td>{{ $inscripcion->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $inscripcion->nombre }}</td>
                        {{--<td>{{ $inscripcion->inscripto_a() }}</td>--}}
                        <td>{{ $inscripcion->correo }}</td>
                        <td>{{ $inscripcion->telefono }}</td>
                        <td>{{ $inscripcion->documento_de_identidad }}</td>
                        <td>{{ $inscripcion->medio_de_pago }}</td>
                        {{--<td>{{ $inscripcion->comentario }}</td>--}}
                        <td>
                            @if($inscripcion->recibir_novedades)
                                SI
                            @else
                                NO
                            @endif
                        </td>



                        {{--<td><a href="{{route('inscripcions.edit', $inscripcion)}}" class="btn btn-sm btn-outline-secondary ">Ver ></a></td>--}}
                        
                        {{--<form class="" action="{{route('inscripcions.update', $inscripcion)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <select class="" id="rol" name="rol">
                                    <option value="inscripcion" @selected((old('rol') == "inscripcion") || $inscripcion->rol == "inscripcion" )>inscripcion</option>
                                    <option value="colaborador" @selected((old('rol') == "colaborador") || $inscripcion->rol == "colaborador" )>colaborador</option>
                                    <option value="administrador" @selected((old('rol') == "administrador") || $inscripcion->rol == "administrador" )>administrador</option>
                                </select>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Guardar</button>
                            </td>
                        </form>--}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Botones de paginacion -->
    {{--{{ $eventos->links('pagination::bootstrap-4') }} --}}

</div>




<!-- --------------------------- -->
<!-- Panel de edicion del evento -->
<!-- Panel de edicion del evento -->
<!-- --------------------------- -->
<div class="container my-5">   

    <div class="text-center my-4">
        <h2 id="in" class="text-center pt-2">Panel de edición del evento</h2>
    </div>


    <div class="row mb-5 mt-5">
        <div class="col-md-12">

            <form class="" action="{{route('eventos.update', $evento)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col col-md-6">
   
                        <div class="form-group mb-3">
                            <label for="nombre">
                                <h4 class="mb-0 mt-3">Nombre</h4>
                                <hr  class="my-1">
                            </label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre', $evento->nombre)}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">

                            <div class="col col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tipo">
                                        <h4 class="mb-0 mt-3">Tipo de evento</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input required type="text" class="form-control" id="tipo" name="tipo" placeholder="..." value="{{old('tipo', $evento->tipo)}}">
                                    @error('tipo')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
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
                            </div>
                        
                        
                            <div class="col col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lugar">
                                        <h4 class="mb-0 mt-3">Lugar</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input type="text" class="form-control" id="lugar" name="lugar" placeholder="..." value="{{old('lugar', $evento->lugar)}}">
                                </div>
                            </div>

                        </div>


                        <div class="form-group mb-3">
                            <label for="responsable">
                                <h4 class="mb-0 mt-3">Responsable</h4>
                                <hr  class="my-1">
                            </label>
                            <input required type="text" class="form-control" id="responsable" name="responsable" placeholder="..." value="{{old('responsable', $evento->responsable)}}">
                            @error('responsable')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row">

                            <div class="col col-md-6">
                                <!--input para el costo de inscripcion-->
                                <div class="form-group mb-3">
                                    <label for="costo_de_inscripcion">
                                        <h4 class="mb-0 mt-3">Costo de inscripción</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input type="number" class="form-control" id="costo_de_inscripcion" name="costo_de_inscripcion" placeholder="..." value="{{old('costo_de_inscripcion', $evento->costo_de_inscripcion)}}" min="0">
                                </div>
                            </div>

                            <div class="col col-md-6">
                                <div class="form-group mb-3">
                                    <label for="cupos_totales">
                                        <h4 class="mb-0 mt-3">Cupos</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input type="number" class="form-control" id="cupos_totales" name="cupos_totales" placeholder="..." value="{{old('cupos_totales', $evento->cupos_totales)}}" min="1">
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="relevancia">
                                <h4 class="mb-0 mt-3">Relevancia</h4>
                                <hr  class="my-1">
                            </label>
                            <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{old('relevancia', $evento->relevancia)}}" min="1">
                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="imagen">
                                <h4 class="mb-0 mt-3">Imagen</h4>
                                <hr  class="my-1">
                            </label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                            @error('imagen')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                            <div class="form-check mb-2">
                                @if (count($evento->multimedias))
                                    <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info', $evento->multimedias->last()->imagen_con_info))>
                                @else
                                <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info'))>
                                @endif
                                <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del evento?</label>
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="descripcion">
                                <h4 class="mb-0 mt-3">Descripción</h4>
                                <hr  class="my-1">
                            </label>
                            <textarea required class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion', $evento->descripcion)}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group mb-3">
                                    <label for="fecha">
                                        <h5 class="mb-0 mt-3">Fecha</h5>
                                        <hr  class="my-1">
                                    </label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha', $evento->fecha)}}">
                                </div>
                            </div>

                            <div class="col col-md-6">
                                <!--checkbox para indicar la frecuencia del evento o taller-->
                                <h5 class="mb-0 mt-3">Frecuencia</h5>
                                <hr  class="my-1">
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="frecuencia_semanal" name="frecuencia_semanal" value="1" @checked(old('frecuencia_semanal', $evento->frecuencia_semanal))>
                                    <label class="form-check-label" for="frecuencia_semanal">semanal</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="frecuencia_mensual" name="frecuencia_mensual" value="1" @checked(old('frecuencia_mensual', $evento->frecuencia_mensual))>
                                    <label class="form-check-label" for="frecuencia_mensual">mensual</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="frecuencia_anual" name="frecuencia_anual" value="1" @checked(old('frecuencia_anual', $evento->frecuencia_anual))>
                                    <label class="form-check-label" for="frecuencia_anual">anual</label>
                                </div>
                            </div>
                        </div>





                    </div>
                
                    <div class="col-md-6">

                        <h4 class="mb-0 mt-3">Día 1</h4>
                        <hr  class="my-1">
                        <div class="row">
                            <div class="col col-md-6">

                                <!--selecciona el dia de la semana-->
                                <div class="form-group mb-3">
                                    <label for="dia_de_semana">Día de la semana</label>
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

                            <div class="col col-md-6">
                                <div class="form-group mb-3">
                                    <label for="hora_de_inicio">Hora de inicio</label>
                                    <input type="time" class="form-control" id="hora_de_inicio" name="hora_de_inicio" value="{{old('hora_de_inicio', $evento->hora_de_inicio)}}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="hora_de_fin">Hora de fin</label>
                                    <input type="time" class="form-control" id="hora_de_fin" name="hora_de_fin" value="{{old('hora_de_fin', $evento->hora_de_fin)}}">
                                </div>
                            </div>

                        </div>


                        @if ($evento->tiene_extenciones && isset($evento->horarios_adicionales()[0])) 
                            <h4>Día 2</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">

                                    <!--selecciona el dia de la semana-->
                                    <div class="form-group mb-3">
                                        <label for="dia_de_semana_2">Dia de la semana</label>
                                        <input type="hidden" name="id_extension_2" value="{{$evento->horarios_adicionales()[0]->id}}">
                                        <select class="form-control" id="dia_de_semana_2" name="dia_de_semana_2">
                                            <option value="Lunes" @selected((old('dia_de_semana_2') == "Lunes") || $evento->horarios_adicionales()[0]->dia_de_semana == "Lunes" )>Lunes</option>
                                            <option value="Martes" @selected((old('dia_de_semana_2') == "Martes") || $evento->horarios_adicionales()[0]->dia_de_semana == "Martes" )>Martes</option>
                                            <option value="Miércoles" @selected((old('dia_de_semana_2') == "Miércoles") || $evento->horarios_adicionales()[0]->dia_de_semana == "Miércoles" )>Miércoles</option>
                                            <option value="Jueves" @selected((old('dia_de_semana_2') == "Jueves") || $evento->horarios_adicionales()[0]->dia_de_semana == "Jueves" )>Jueves</option>
                                            <option value="Viernes" @selected((old('dia_de_semana_2') == "Viernes") || $evento->horarios_adicionales()[0]->dia_de_semana == "Viernes" )>Viernes</option>
                                            <option value="Sábado" @selected((old('dia_de_semana_2') == "Sábado") || $evento->horarios_adicionales()[0]->dia_de_semana == "Sábado" )>Sábado</option>
                                            <option value="Domingo" @selected((old('dia_de_semana_2') == "Domingo") || $evento->horarios_adicionales()[0]->dia_de_semana == "Domingo" )>Domingo</option>
                                        </select>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="activar_dia_2" name="activar_dia_2" value="1" @checked(old('activar_dia_2', $evento->horarios_adicionales()[0]->activo))>
                                        <label class="form-check-label" for="activar_dia_2">Publicar horario?</label>
                                    </div>

                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="hora_de_inicio_2">Hora de inicio</label>
                                        <input type="time" class="form-control" id="hora_de_inicio_2" name="hora_de_inicio_2" value="{{old('hora_de_inicio_2', $evento->horarios_adicionales()[0]->hora_de_inicio)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="hora_de_fin_2">Hora de fin</label>
                                        <input type="time" class="form-control" id="hora_de_fin_2" name="hora_de_fin_2" value="{{old('hora_de_fin_2', $evento->horarios_adicionales()[0]->hora_de_fin)}}">
                                    </div>
                                </div>

                            </div>
                        @else
                            <h4>Día 2</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">

                                    <!--selecciona el dia de la semana-->
                                    <div class="form-group mb-3">
                                        <label for="dia_de_semana_2">Dia de la semana</label>
                                        <select class="form-control" id="dia_de_semana_2" name="dia_de_semana_2">
                                            <option value="Lunes" @selected((old('dia_de_semana_2') == "Lunes") )>Lunes</option>
                                            <option value="Martes" @selected((old('dia_de_semana_2') == "Martes") )>Martes</option>
                                            <option value="Miércoles" @selected((old('dia_de_semana_2') == "Miércoles") )>Miércoles</option>
                                            <option value="Jueves" @selected((old('dia_de_semana_2') == "Jueves") )>Jueves</option>
                                            <option value="Viernes" @selected((old('dia_de_semana_2') == "Viernes") )>Viernes</option>
                                            <option value="Sábado" @selected((old('dia_de_semana_2') == "Sábado") )>Sábado</option>
                                            <option value="Domingo" @selected((old('dia_de_semana_2') == "Domingo") )>Domingo</option>
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="hora_de_inicio_2">Hora de inicio</label>
                                        <input type="time" class="form-control" id="hora_de_inicio_2" name="hora_de_inicio_2" value="{{old('hora_de_inicio_2')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="hora_de_fin_2">Hora de fin</label>
                                        <input type="time" class="form-control" id="hora_de_fin_2" name="hora_de_fin_2" value="{{old('hora_de_fin_2')}}">
                                    </div>
                                </div>

                            </div>
                        @endif


                        @if ($evento->tiene_extenciones && isset($evento->horarios_adicionales()[1])) 
                            <h4>Día 3</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">

                                    <!--selecciona el dia de la semana-->
                                    <div class="form-group mb-3">
                                        <label for="dia_de_semana_3">Dia de la semana</label>
                                        <input type="hidden" name="id_extension_3" value="{{$evento->horarios_adicionales()[1]->id}}">
                                        <select class="form-control" id="dia_de_semana_3" name="dia_de_semana_3">
                                            <option value="Lunes" @selected((old('dia_de_semana_3') == "Lunes") || $evento->horarios_adicionales()[1]->dia_de_semana == "Lunes" )>Lunes</option>
                                            <option value="Martes" @selected((old('dia_de_semana_3') == "Martes") || $evento->horarios_adicionales()[1]->dia_de_semana == "Martes" )>Martes</option>
                                            <option value="Miércoles" @selected((old('dia_de_semana_3') == "Miércoles") || $evento->horarios_adicionales()[1]->dia_de_semana == "Miércoles" )>Miércoles</option>
                                            <option value="Jueves" @selected((old('dia_de_semana_3') == "Jueves") || $evento->horarios_adicionales()[1]->dia_de_semana == "Jueves" )>Jueves</option>
                                            <option value="Viernes" @selected((old('dia_de_semana_3') == "Viernes") || $evento->horarios_adicionales()[1]->dia_de_semana == "Viernes" )>Viernes</option>
                                            <option value="Sábado" @selected((old('dia_de_semana_3') == "Sábado") || $evento->horarios_adicionales()[1]->dia_de_semana == "Sábado" )>Sábado</option>
                                            <option value="Domingo" @selected((old('dia_de_semana_3') == "Domingo") || $evento->horarios_adicionales()[1]->dia_de_semana == "Domingo" )>Domingo</option>
                                        </select>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="activar_dia_3" name="activar_dia_3" value="1" @checked(old('activar_dia_3', $evento->horarios_adicionales()[1]->activo))>
                                        <label class="form-check-label" for="activar_dia_3">Publicar horario?</label>
                                    </div>

                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="hora_de_inicio_3">Hora de inicio</label>
                                        <input type="time" class="form-control" id="hora_de_inicio_3" name="hora_de_inicio_3" value="{{old('hora_de_inicio_3', $evento->horarios_adicionales()[1]->hora_de_inicio)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="hora_de_fin_3">Hora de fin</label>
                                        <input type="time" class="form-control" id="hora_de_fin_3" name="hora_de_fin_3" value="{{old('hora_de_fin_3', $evento->horarios_adicionales()[1]->hora_de_fin)}}">
                                    </div>
                                </div>

                            </div>
                        @else
                            <h4>Día 3</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">

                                    <!--selecciona el dia de la semana-->
                                    <div class="form-group mb-3">
                                        <label for="dia_de_semana_3">Dia de la semana</label>
                                        <select class="form-control" id="dia_de_semana_3" name="dia_de_semana_3">
                                            <option value="Lunes" @selected((old('dia_de_semana_3') == "Lunes") )>Lunes</option>
                                            <option value="Martes" @selected((old('dia_de_semana_3') == "Martes") )>Martes</option>
                                            <option value="Miércoles" @selected((old('dia_de_semana_3') == "Miércoles") )>Miércoles</option>
                                            <option value="Jueves" @selected((old('dia_de_semana_3') == "Jueves") )>Jueves</option>
                                            <option value="Viernes" @selected((old('dia_de_semana_3') == "Viernes") )>Viernes</option>
                                            <option value="Sábado" @selected((old('dia_de_semana_3') == "Sábado") )>Sábado</option>
                                            <option value="Domingo" @selected((old('dia_de_semana_3') == "Domingo") )>Domingo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="hora_de_inicio_3">Hora de inicio</label>
                                        <input type="time" class="form-control" id="hora_de_inicio_3" name="hora_de_inicio_3" value="{{old('hora_de_inicio_3')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="hora_de_fin_3">Hora de fin</label>
                                        <input type="time" class="form-control" id="hora_de_fin_3" name="hora_de_fin_3" value="{{old('hora_de_fin_3')}}">
                                    </div>
                                </div>

                            </div>
                        @endif
                                
                            
                        @if ($evento->tiene_extenciones && isset($evento->horarios_adicionales()[2]))     
                            <h4>Día 4</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">

                                    <!--selecciona el dia de la semana-->
                                    <div class="form-group mb-3">
                                        <label for="dia_de_semana_4">Dia de la semana</label>
                                        <input type="hidden" name="id_extension_4" value="{{$evento->horarios_adicionales()[2]->id}}">
                                        <select class="form-control" id="dia_de_semana_4" name="dia_de_semana_4">
                                            <option value="Lunes" @selected((old('dia_de_semana_4') == "Lunes") || $evento->horarios_adicionales()[2]->dia_de_semana == "Lunes" )>Lunes</option>
                                            <option value="Martes" @selected((old('dia_de_semana_4') == "Martes") || $evento->horarios_adicionales()[2]->dia_de_semana == "Martes" )>Martes</option>
                                            <option value="Miércoles" @selected((old('dia_de_semana_4') == "Miércoles") || $evento->horarios_adicionales()[2]->dia_de_semana == "Miércoles" )>Miércoles</option>
                                            <option value="Jueves" @selected((old('dia_de_semana_4') == "Jueves") || $evento->horarios_adicionales()[2]->dia_de_semana == "Jueves" )>Jueves</option>
                                            <option value="Viernes" @selected((old('dia_de_semana_4') == "Viernes") || $evento->horarios_adicionales()[2]->dia_de_semana == "Viernes" )>Viernes</option>
                                            <option value="Sábado" @selected((old('dia_de_semana_4') == "Sábado") || $evento->horarios_adicionales()[2]->dia_de_semana == "Sábado" )>Sábado</option>
                                            <option value="Domingo" @selected((old('dia_de_semana_4') == "Domingo") || $evento->horarios_adicionales()[2]->dia_de_semana == "Domingo" )>Domingo</option>
                                        </select>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="activar_dia_4" name="activar_dia_4" value="1" @checked(old('activar_dia_4', $evento->horarios_adicionales()[2]->activo))>
                                        <label class="form-check-label" for="activar_dia_4">Publicar horario?</label>
                                    </div>

                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="hora_de_inicio_4">Hora de inicio</label>
                                        <input type="time" class="form-control" id="hora_de_inicio_4" name="hora_de_inicio_4" value="{{old('hora_de_inicio_4', $evento->horarios_adicionales()[2]->hora_de_inicio)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="hora_de_fin_4">Hora de fin</label>
                                        <input type="time" class="form-control" id="hora_de_fin_4" name="hora_de_fin_4" value="{{old('hora_de_fin_4', $evento->horarios_adicionales()[2]->hora_de_fin)}}">
                                    </div>
                                </div>

                            </div>
                        @else
                            <h4>Día 4</h4>
                            <hr>
                            <div class="row">
                                <div class="col col-md-6">

                                    <!--selecciona el dia de la semana-->
                                    <div class="form-group mb-3">
                                        <label for="dia_de_semana_4">Dia de la semana</label>
                                        <select class="form-control" id="dia_de_semana_4" name="dia_de_semana_4">
                                            <option value="Lunes" @selected((old('dia_de_semana_4') == "Lunes") )>Lunes</option>
                                            <option value="Martes" @selected((old('dia_de_semana_4') == "Martes") )>Martes</option>
                                            <option value="Miércoles" @selected((old('dia_de_semana_4') == "Miércoles") )>Miércoles</option>
                                            <option value="Jueves" @selected((old('dia_de_semana_4') == "Jueves") )>Jueves</option>
                                            <option value="Viernes" @selected((old('dia_de_semana_4') == "Viernes") )>Viernes</option>
                                            <option value="Sábado" @selected((old('dia_de_semana_4') == "Sábado") )>Sábado</option>
                                            <option value="Domingo" @selected((old('dia_de_semana_4') == "Domingo") )>Domingo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="hora_de_inicio_4">Hora de inicio</label>
                                        <input type="time" class="form-control" id="hora_de_inicio_4" name="hora_de_inicio_4" value="{{old('hora_de_inicio_4')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="hora_de_fin_4">Hora de fin</label>
                                        <input type="time" class="form-control" id="hora_de_fin_4" name="hora_de_fin_4" value="{{old('hora_de_fin_4')}}">
                                    </div>
                                </div>

                            </div>
                        @endif                        
                        
                    </div>

                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $evento->activo))>
                        <label class="form-check-label" for="activo">Publicar?</label>
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