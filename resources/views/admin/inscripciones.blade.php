@extends('layouts.plantilla')

@section('title', 'Inscripciones')
@section('meta-description', 'metadescripción de la pagina de Inscripciones')


@section('content')
    

    <div class="text-center my-4">
        <h1 id="in" class="text-center pt-2">INSCRIPCIONES</h1>
    </div>


    <!-- Tabla de Usuarios -->
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


    <div class="container">
        <div class="pb-3" style="overflow-x: scroll;">
            <table id="table_id" class="display {{--table table-striped table-hover table-sm--}}">
                <thead>
                    <tr>
                        {{--<th>id</th>--}}
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Inscripción</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Recibir novedades</th>
                        
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($inscripciones as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->created_at->format('d/m/Y') }}</td>
                            {{--<td>{{ $inscripcion->id }}</td>--}}
                            <td>{{ $inscripcion->nombre }}</td>
                            <td>{{ $inscripcion->inscripto_a() }}</td>
                            <td>{{ $inscripcion->correo }}</td>
                            <td>{{ $inscripcion->telefono }}</td>
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

@endsection

