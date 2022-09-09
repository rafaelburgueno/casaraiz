@extends('layouts.plantilla')

@section('title', 'Usuarios')
@section('meta-description', 'metadescripción de la pagina de Usuarios')


@section('content')
    

    <div class="text-center my-4">
        <h1 id="in" class="text-center pt-2">USUARIOS</h1>
    </div>


<!-- Tabla de Usuarios -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dataTables.css')}}">
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css')}}" />--}}
<script type="text/javascript" src="{{ asset('/js/dataTables.js')}}" charset="utf8"></script>
{{--<script type="text/javascript" src="{{ asset('/js/calendar.js') }}"></script>--}}

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>

<!-- Tabla de Usuarios -->


    <div class="container">
        <div class="pb-3" style="overflow-x: scroll;">
            <table id="table_id" class="display {{--table table-striped table-hover--}}">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->rol }}</td>
                            <td><a href="{{route('usuarios.edit', $usuario)}}" class="btn btn-sm btn-outline-secondary ">Ver ></a></td>
                            
                            {{--<form class="" action="{{route('usuarios.update', $usuario)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <select class="" id="rol" name="rol">
                                        <option value="usuario" @selected((old('rol') == "usuario") || $usuario->rol == "usuario" )>usuario</option>
                                        <option value="colaborador" @selected((old('rol') == "colaborador") || $usuario->rol == "colaborador" )>colaborador</option>
                                        <option value="administrador" @selected((old('rol') == "administrador") || $usuario->rol == "administrador" )>administrador</option>
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

