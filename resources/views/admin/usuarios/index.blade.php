@extends('layouts.plantilla')

@section('title', 'Usuarios')
@section('meta-description', 'metadescripción de la pagina de Usuarios')


@section('content')
    

    <div class="my-2">
        <h1 id="in" class="text-center pt-2">Usuarios</h1>
    </div>


    <div class="container">

        <table class="table table-striped table-hover">
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

        <!-- Botones de paginacion -->
        {{--{{ $eventos->links('pagination::bootstrap-4') }} --}}
   
    </div>

@endsection

