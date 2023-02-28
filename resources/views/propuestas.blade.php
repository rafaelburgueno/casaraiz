@extends('layouts.plantilla')

@section('title', 'Propuestas')
@section('meta-description', 'metadescripción de la pagina de Propuestas')


@section('content')
    

    <div class="text-center my-4">
        <h1 id="in" class="text-center pt-2">PROPUESTAS</h1>
    </div>


<!-- Tabla de Propuestas -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css')}}" />--}}
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
{{--<script type="text/javascript" src="{{ asset('/js/calendar.js') }}"></script>--}}

<script>
    $(document).ready( function () {
        $('#tabla_de_propuestas').DataTable({
			order: [
				[4, 'desc']
			]
		});
    } );
</script>

<!-- Tabla de Propuestas -->


    <div class="container">
        <div class="pb-3" style="overflow-x: scroll;">
            <table id="tabla_de_propuestas" class="display {{--table table-striped table-hover--}}">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Emprendimiento</th>
                        <th>Fecha</th>
                        {{--<th>Email</th>
                        <th>Teléfono</th>
                        <th>Redes sociales</th>
                        <th>Descripcion</th>
                        <th>Foto</th>--}}
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($propuestas as $propuesta)
                        <tr>
                            <td><a class="btn btn-light" data-toggle="modal" data-target="#info_de_la_propuesta_{{ $propuesta->id }}">Ver</a></td>
                            <td>{{ $propuesta->id }}</td>
                            <td>{{ $propuesta->nombre }}</td>
                            <td>{{ $propuesta->nombre_del_emprendimiento }}</td>
                            <td>{{ $propuesta->created_at }}</td>
                            {{--<td>{{ $propuesta->correo }}</td>
                            <td>{{ $propuesta->telefono }}</td>
                            <td>{{ $propuesta->redes_sociales }}</td>
                            <td>{{ $propuesta->descripcion }}</td>
                            <td>
                                @if (count($propuesta->multimedias))
                                <img src="{{$propuesta->multimedias->last()->url}}" style="width: 150px;" class="img-thumbnail" alt="...">
                                @endif
                            </td>
                            --}}
                            
                            {{--<form class="" action="{{route('propuestas.update', $propuesta)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <select class="" id="rol" name="rol">
                                        <option value="propuesta" @selected((old('rol') == "propuesta") || $propuesta->rol == "propuesta" )>propuesta</option>
                                        <option value="colaborador" @selected((old('rol') == "colaborador") || $propuesta->rol == "colaborador" )>colaborador</option>
                                        <option value="administrador" @selected((old('rol') == "administrador") || $propuesta->rol == "administrador" )>administrador</option>
                                    </select>
                                </td>

                                <td>
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">Guardar</button>
                                </td>
                            </form>--}}
                        </tr>


                    <!--MODAL CON INFORMACION DEL PROPUESTA-->
                    <!--MODAL CON INFORMACION DEL PROPUESTA-->
                    <!--MODAL CON INFORMACION DEL PROPUESTA-->
                    <div class="modal fade" id="info_de_la_propuesta_{{ $propuesta->id }}" tabindex="-1" role="dialog" aria-labelledby="info_del_propuesta_{{ $propuesta->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content negro">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="info_del_propuesta_{{ $propuesta->id }}Label">{{$propuesta->created_at}} | id:{{$propuesta->id}}</h5><br>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body ">
                                    <p>Nombre: <strong>{{ $propuesta->nombre }}</strong></p>
                                    <p>Nombre del emprendimiento: <strong>{{ $propuesta->nombre_del_emprendimiento }}</strong></p>
                                    <p>Descripcion: <strong>{{ $propuesta->descripcion }}</strong></p>
                                    @if($propuesta->imagen)
                                    <hr>
                                        <div class="text-center">
                                            {{--<img src="{{$propuesta->multimedias->last()->url}}" style="width: 60%;" class="img-thumbnail" alt="...">--}}
                                            <img src="{{$propuesta->imagen->url}}" style="width: 60%;" class="img-thumbnail" alt="...">
                                        </div>
                                    @endif
                                    <hr>
                                    <p>Correo: <strong>{{ $propuesta->correo }}</strong></p>
                                    <p>Telefono: <strong>{{ $propuesta->telefono }}</strong></p>
                                    @if($propuesta->redes_sociales)
                                        <p>Redes_sociales: <strong>{{ $propuesta->redes_sociales }}</strong></p>
                                    @endif
                                </div>
                                

                            </div>
                        </div>
                    </div>
                    <!--FIN DEL MODAL CON INFORMACION DEL propuesta-->


                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Botones de paginacion -->
        {{--{{ $eventos->links('pagination::bootstrap-4') }} --}}
   
    </div>

@endsection

