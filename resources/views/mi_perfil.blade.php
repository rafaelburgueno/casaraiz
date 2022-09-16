@extends('layouts.plantilla')

@section('title', 'Usuarios')
@section('meta-description', 'metadescripción de la pagina de mi perfil')


@section('content')

<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">Mi perfil</h1>
</div>

<div class="container">

    <div class="card">
        @if (count(auth()->user()->multimedias))
        <div class="text-center p-2">
            <img src="{{auth()->user()->multimedias->last()->url}}" class="rounded-circle w-25" alt="">        
        </div>
        {{--<p>{{auth()->user()->multimedias->last()->activo}}</p>--}}
        @endif

        <div class="card-body">
            <h1>{{auth()->user()->name}}</h1>
            {{--<p>id: {{ auth()->user()->id }}</p>--}}
            {{--<p>Nombre: {{ $usuario->name }}</p>--}}

            <p>Email: {{ auth()->user()->email }}</p>
            @if(auth()->user()->telefono)
                <p>Teléfono: {{ auth()->user()->telefono }}</p>
            @endif
            @if(auth()->user()->documento_de_identidad)
                <p>Documento: {{ auth()->user()->documento_de_identidad }}</p>
            @endif
            @if(auth()->user()->fecha_de_nacimiento)
                <p>Fecha de nacimiento: {{ auth()->user()->fecha_de_nacimiento }}</p>
            @endif
        </div>
    </div>

    <div class="row mb-5 mt-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
    
            <form class="" action="{{route('mi_perfil.update', auth()->user())}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!--Input nombre -->
                <div class="form-group mb-3">
                    <label for="nombre">
                        <h5 class="mb-0 mt-3">Nombre</h5>
                        <hr  class="my-1">
                    </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', auth()->user()->name)}}">
                    @error('nombre')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{--<!--Input correo -->
                <div class="form-group mb-3">
                    <label for="email">
                        <h5 class="mb-0 mt-3">Correo</h5>
                        <hr  class="my-1">
                    </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email', auth()->user()->email)}}">
                    @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>--}}

                <!--Input imagen -->
                <div class="form-group mb-3">
                    <h5 class="mb-0 mt-3">Imagen</h5>
                    <hr  class="my-1">
                    <div class="form-check mb-2">
                        @if (count(auth()->user()->multimedias))
                            <input type="checkbox" class="form-check-input" id="imagen_publica" name="imagen_publica" value="1" @checked(old('imagen_publica', auth()->user()->multimedias->last()->activo))>
                        @else
                            <input type="checkbox" class="form-check-input" id="imagen_publica" name="imagen_publica" value="1" @checked(old('imagen_publica'))>
                        @endif
                            <label class="form-check-label" for="imagen_publica">¿Permitir que la imagen sea pública?</label>
                    </div>

                    <label for="imagen">Cambiar imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                    @error('imagen')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!--Input documento -->
                <div class="form-group mb-3">
                    <label for="documento">
                        <h5 class="mb-0 mt-3">Documento</h5>
                        <hr  class="my-1">
                    </label>
                    <input type="number" min="1111111" max="999999999" placeholder="sin puntos ni guión" class="form-control" id="documento" name="documento" value="{{old('documento', auth()->user()->documento_de_identidad)}}">
                    @error('documento')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!--Input fecha -->
                <div class="form-group mb-3">
                    <label for="fecha">
                        <h5 class="mb-0 mt-3">Fecha de nacimiento</h5>
                        <hr class="my-1">
                    </label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha', auth()->user()->fecha_de_nacimiento)}}">
                </div>

                <!--Input telefono -->
                <div class="form-group mb-3">
                    <label for="telefono">
                        <h5 class="mb-0 mt-3">Telefono</h5>
                        <hr  class="my-1">
                    </label>
                    <input type="number" min="1111111" placeholder="09xxxxxxxx" class="form-control" id="telefono" name="telefono" value="{{old('telefono', auth()->user()->telefono)}}">
                    @error('telefono')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!--Input contraseña -->
                <div class="form-group mb-5">
                    <label for="password">
                        <h5 class="mb-0 mt-3">Nueva contraseña</h5>
                        <hr  class="my-1">
                    </label>
                    <input type="password" placeholder="Contraseña" class="form-control" id="password" name="password" value="{{old('password')}}">
                    @error('password')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    
                    <input type="password" placeholder="Confirmar contraseña" class="form-control mt-1" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <button type="submit" class="btn btn-block btn-outline-secondary">Actualizar</button>
            </form>
    
        </div>
        <div class="col-sm-2"></div>
    </div>
    
    
</div>

@endsection