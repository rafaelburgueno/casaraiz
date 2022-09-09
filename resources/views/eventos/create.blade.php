@extends('layouts.plantilla')

@section('title', 'Crear Evento')
@section('meta-description', 'metadescripción de la pagina de creacion de eventos')


@section('content')


<div class="text-center my-4">
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

                            <div class="form-group mb-3">
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
                                    <select class="form-control" id="dia_de_semana" name="dia_de_semana">
                                        <option value="Lunes" @selected(old('dia_de_semana') == "Lunes")>Lunes</option>
                                        <option value="Martes" @selected(old('dia_de_semana') == "Martes")>Martes</option>
                                        <option value="Miercoles" @selected(old('dia_de_semana') == "Miércoles")>Miércoles</option>
                                        <option value="Jueves" @selected(old('dia_de_semana') == "Jueves")>Jueves</option>
                                        <option value="Viernes" @selected(old('dia_de_semana') == "Viernes")>Viernes</option>
                                        <option value="Sabado" @selected(old('dia_de_semana') == "Sábado")>Sábado</option>
                                        <option value="Domingo" @selected(old('dia_de_semana') == "Domingo")>Domingo</option>
                                    </select>
                                    @error('dia_de_semana')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col col-md-6">

                                <div class="form-group mb-3">
                                    <label for="hora_de_inicio">Hora de inicio</label>
                                    <input type="time" class="form-control" id="hora_de_inicio" name="hora_de_inicio" value="{{old('hora_de_inicio')}}">
                                    @error('hora_de_inicio')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="hora_de_fin">Hora de fin</label>
                                    <input type="time" class="form-control" id="hora_de_fin" name="hora_de_fin" value="{{old('hora_de_fin')}}">
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
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Crear evento</button>
            </form>
        </div>
    </div>
</div>
    


@endsection