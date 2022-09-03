@extends('layouts.plantilla')

@section('title', 'Usuarios')
@section('meta-description', 'metadescripción de la pagina de Usuarios')


@section('content')

<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">USUARIO</h1>
</div>

<div class="container">

    <div class="text-center">

        <h1>{{$usuario->name}}</h1>
        
        
        <p>id: {{ $usuario->id }}</p>
        {{--<p>Nombre: {{ $usuario->name }}</p>--}}
        <p>Email: {{ $usuario->email }}</p>
        <p>Teléfono: {{ $usuario->telefono }}</p>
        <p>Documento: {{ $usuario->documento_de_identidad }}</p>
        <p>Fecha de nacimiento: {{ $usuario->fecha_de_nacimiento }}</p>

        <form class="" action="{{route('usuarios.update', $usuario)}}" method="POST">
            @csrf
            @method('PUT')

            <p>Rol: 
                <select class="p-1 m-0" id="rol" name="rol">
                    <option value="usuario" @selected((old('rol') == "usuario") || $usuario->rol == "usuario" )>usuario</option>
                    <option value="colaborador" @selected((old('rol') == "colaborador") || $usuario->rol == "colaborador" )>colaborador</option>
                    <option value="administrador" @selected((old('rol') == "administrador") || $usuario->rol == "administrador" )>administrador</option>
                </select>
                
                <button type="submit" class="m-0 btn btn-sm btn-outline-secondary">Actualizar Rol</button>
            </p>
        </form>

    </div>
    
</div>

@endsection