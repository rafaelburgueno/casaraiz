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
                            {{--<a href="{{route('eventos.show', $evento)}}" class="btn btn-sm btn-outline-secondary ">Ver</a>--}}
                            <a href="{{route('eventos.edit', $evento)}}" class="btn btn-sm btn-outline-secondary ">Ver ></a>
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


<div class="text-center mb-4 mt-5">
    <h1 id="in" class="text-center pt-2">CREAR EVENTO</h1>
</div>


<div class="container">    

    <div class="row mb-5 mt-5">
        <div class="col-md-12">

            <form class="p-3" action="{{route('eventos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">
   
                        <div class="form-group mb-3">
                            <label for="nombre">
                                <h4 class="mb-0 mt-3">Nombre</h4>
                                <hr  class="my-1">
                            </label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre')}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tipo">
                                        <h4 class="mb-0 mt-3">Tipo de evento</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input required type="text" class="form-control" id="tipo" name="tipo" placeholder="..." value="{{old('tipo')}}">
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

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lugar">
                                        <h4 class="mb-0 mt-3">Lugar</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input required type="text" class="form-control" id="lugar" name="lugar" placeholder="..." value="{{old('lugar')}}">
                                    @error('lugar')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group mb-3">
                            <label for="responsable">
                                <h4 class="mb-0 mt-3">Responsable</h4>
                                <hr  class="my-1">
                            </label>
                            <input required type="text" class="form-control" id="responsable" name="responsable" placeholder="..." value="{{old('responsable')}}">
                            @error('responsable')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <div class="row">

                            <div class="col-md-6">
                                <!--input para el costo de inscripcion-->
                                <div class="form-group mb-3">
                                    <label for="costo_de_inscripcion">
                                        <h4 class="mb-0 mt-3">Costo de inscripción</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input type="number" class="form-control" id="costo_de_inscripcion" name="costo_de_inscripcion" placeholder="..." value="{{old('costo_de_inscripcion')}}" min="0">
                                    @error('costo_de_inscripcion')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="cupos_totales">
                                        <h4 class="mb-0 mt-3">Cupos</h4>
                                        <hr  class="my-1">
                                    </label>
                                    <input type="number" class="form-control" id="cupos_totales" name="cupos_totales" placeholder="..." value="{{old('cupos_totales')}}" min="1">
                                    @error('cupos_totales')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        
                        <div class="form-group mb-3">
                            <label for="relevancia">
                                <h4 class="mb-0 mt-3">Relevancia</h4>
                                <hr  class="my-1">
                            </label>
                            <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{old('relevancia')}}" min="1">
                            @error('relevancia')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
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

                            <div class="form-group mb-3 mt-2">
                                <label for="descripcion_img">Descripción de la imagen (campo 'alt')</label>
                                <textarea required class="form-control" id="descripcion_img" name="descripcion_img" rows="2">{{old('descripcion_img')}}</textarea>
                                @error('descripcion_img')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info'))>
                                <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del evento?</label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="descripcion">
                                <h4 class="mb-0 mt-3">Descripción</h4>
                                <hr  class="my-1">
                            </label>
                            <textarea required class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion')}}</textarea>
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
                                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha')}}">
                                    @error('fecha')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!--checkbox para indicar la frecuencia del evento o taller-->
                                <h5 class="mb-0 mt-3">Frecuencia</h5>
                                <hr  class="my-1">
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="frecuencia_semanal" name="frecuencia_semanal" value="1" @checked(old('frecuencia_semanal'))>
                                    <label class="form-check-label" for="frecuencia_semanal">semanal</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="frecuencia_mensual" name="frecuencia_mensual" value="1" @checked(old('frecuencia_mensual'))>
                                    <label class="form-check-label" for="frecuencia_mensual">mensual</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="frecuencia_anual" name="frecuencia_anual" value="1" @checked(old('frecuencia_anual'))>
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
                                    <label for="dia_de_semana">Dia de la semana</label>
                                    <select required class="form-control" id="dia_de_semana" name="dia_de_semana">
                                        <option value="Domingo" @selected(old('dia_de_semana') == "Domingo")>Domingo</option>
                                        <option value="Lunes" @selected(old('dia_de_semana') == "Lunes")>Lunes</option>
                                        <option value="Martes" @selected(old('dia_de_semana') == "Martes")>Martes</option>
                                        <option value="Miercoles" @selected(old('dia_de_semana') == "Miércoles")>Miércoles</option>
                                        <option value="Jueves" @selected(old('dia_de_semana') == "Jueves")>Jueves</option>
                                        <option value="Viernes" @selected(old('dia_de_semana') == "Viernes")>Viernes</option>
                                        <option value="Sabado" @selected(old('dia_de_semana') == "Sábado")>Sábado</option>
                                    </select>
                                    @error('dia_de_semana')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="hora_de_inicio">Hora de inicio</label>
                                    <input required type="time" class="form-control" id="hora_de_inicio" name="hora_de_inicio" value="{{old('hora_de_inicio')}}">
                                    @error('hora_de_inicio')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="hora_de_fin">Hora de fin</label>
                                    <input required type="time" class="form-control" id="hora_de_fin" name="hora_de_fin" value="{{old('hora_de_fin')}}">
                                    @error('hora_de_fin')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <h4 class="mb-0 mt-3">Día 2</h4>
                        <hr  class="my-1">
                        <div class="row">
                            <div class="col col-md-6">

                                <!--selecciona el dia de la semana-->
                                <div class="form-group mb-3">
                                    <label for="dia_de_semana_2">Dia de la semana</label>
                                    <select class="form-control" id="dia_de_semana_2" name="dia_de_semana_2">
                                        <option value="Lunes" @selected(old('dia_de_semana_2') == "Lunes")>Lunes</option>
                                        <option value="Martes" @selected(old('dia_de_semana_2') == "Martes")>Martes</option>
                                        <option value="Miercoles" @selected(old('dia_de_semana_2') == "Miércoles")>Miércoles</option>
                                        <option value="Jueves" @selected(old('dia_de_semana_2') == "Jueves")>Jueves</option>
                                        <option value="Viernes" @selected(old('dia_de_semana_2') == "Viernes")>Viernes</option>
                                        <option value="Sabado" @selected(old('dia_de_semana_2') == "Sábado")>Sábado</option>
                                        <option value="Domingo" @selected(old('dia_de_semana_2') == "Domingo")>Domingo</option>
                                    </select>
                                    @error('dia_de_semana_2')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="hora_de_inicio_2">Hora de inicio</label>
                                    <input type="time" class="form-control" id="hora_de_inicio_2" name="hora_de_inicio_2" value="{{old('hora_de_inicio_2')}}">
                                    @error('hora_de_inicio_2')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="hora_de_fin_2">Hora de fin</label>
                                    <input type="time" class="form-control" id="hora_de_fin_2" name="hora_de_fin_2" value="{{old('hora_de_fin_2')}}">
                                    @error('hora_de_fin_2')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <h4 class="mb-0 mt-3">Día 3</h4>
                        <hr  class="my-1">
                        <div class="row">
                            <div class="col col-md-6">

                                <!--selecciona el dia de la semana-->
                                <div class="form-group mb-3">
                                    <label for="dia_de_semana_3">Dia de la semana</label>
                                    <select class="form-control" id="dia_de_semana_3" name="dia_de_semana_3">
                                        <option value="Lunes" @selected(old('dia_de_semana_3') == "Lunes")>Lunes</option>
                                        <option value="Martes" @selected(old('dia_de_semana_3') == "Martes")>Martes</option>
                                        <option value="Miercoles" @selected(old('dia_de_semana_3') == "Miércoles")>Miércoles</option>
                                        <option value="Jueves" @selected(old('dia_de_semana_3') == "Jueves")>Jueves</option>
                                        <option value="Viernes" @selected(old('dia_de_semana_3') == "Viernes")>Viernes</option>
                                        <option value="Sabado" @selected(old('dia_de_semana_3') == "Sábado")>Sábado</option>
                                        <option value="Domingo" @selected(old('dia_de_semana_3') == "Domingo")>Domingo</option>
                                    </select>
                                    @error('dia_de_semana_3')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="hora_de_inicio_3">Hora de inicio</label>
                                    <input type="time" class="form-control" id="hora_de_inicio_3" name="hora_de_inicio_3" value="{{old('hora_de_inicio_3')}}">
                                    @error('hora_de_inicio_3')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="hora_de_fin_3">Hora de fin</label>
                                    <input type="time" class="form-control" id="hora_de_fin_3" name="hora_de_fin_3" value="{{old('hora_de_fin_3')}}">
                                    @error('hora_de_fin_3')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <h4 class="mb-0 mt-3">Día 4</h4>
                        <hr  class="my-1">
                        <div class="row">
                            <div class="col col-md-6">

                                <!--selecciona el dia de la semana-->
                                <div class="form-group mb-3">
                                    <label for="dia_de_semana_4">Dia de la semana</label>
                                    <select class="form-control" id="dia_de_semana_4" name="dia_de_semana_4">
                                        <option value="Lunes" @selected(old('dia_de_semana_4') == "Lunes")>Lunes</option>
                                        <option value="Martes" @selected(old('dia_de_semana_4') == "Martes")>Martes</option>
                                        <option value="Miercoles" @selected(old('dia_de_semana_4') == "Miércoles")>Miércoles</option>
                                        <option value="Jueves" @selected(old('dia_de_semana_4') == "Jueves")>Jueves</option>
                                        <option value="Viernes" @selected(old('dia_de_semana_4') == "Viernes")>Viernes</option>
                                        <option value="Sabado" @selected(old('dia_de_semana_4') == "Sábado")>Sábado</option>
                                        <option value="Domingo" @selected(old('dia_de_semana_4') == "Domingo")>Domingo</option>
                                    </select>
                                    @error('dia_de_semana_4')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="hora_de_inicio_4">Hora de inicio</label>
                                    <input type="time" class="form-control" id="hora_de_inicio_4" name="hora_de_inicio_4" value="{{old('hora_de_inicio_4')}}">
                                    @error('hora_de_inicio_4')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="hora_de_fin_4">Hora de fin</label>
                                    <input type="time" class="form-control" id="hora_de_fin_4" name="hora_de_fin_4" value="{{old('hora_de_fin_4')}}">
                                    @error('hora_de_fin_4')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        
                    </div>

                    <div class="form-check mb-2 ml-3">
                        <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                        <label class="form-check-label" for="activo">Publicar?</label>
                    </div>
                            
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block spin-procesando">Crear evento</button>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.spin-procesando').click(function(){
            if(
                document.getElementById("nombre").value != '' &&
                document.getElementById("tipo").value != '' &&
                document.getElementById("lugar").value != '' &&  
                document.getElementById("responsable").value != '' &&  
                document.getElementById("descripcion").value != '' 
            ){
            
                let timerInterval
                Swal.fire({
                title: 'Procesando',
                html: 'Por favor espere.',
                //timer: 10000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
            }

        });


        /*cuando secambia el input fecha se establece automaticamente el dia del primer horario*/
        $("#fecha").change(function(){

            let fecha = $("#fecha").val();
            
            //let dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
            
            var b = fecha.split(/\D/);
            date = new Date(b[0], --b[1], b[2]);

            //$("#dia_de_semana").val(dias[date.getDay()]);
            //document.querySelector('dia_de_semana').querySelector('option')[date.getDay()].selected = 'selected';
            document.getElementById("dia_de_semana").selectedIndex = date.getDay();

            //alert("el dia es: " + date.getDay());
        });


    });

</script>


@endsection