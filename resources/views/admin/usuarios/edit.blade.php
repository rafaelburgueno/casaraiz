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
                
                <button type="submit" class="m-0 btn btn-sm btn-outline-secondary spin-procesando">Actualizar Rol</button>
            </p>
        </form>

    </div>


    
    <!-- Historial -->
    <!-- Historial -->
    <!-- Historial -->
    <div class="my-5"></div>
    <div class="text-center my-4">
        <h3 id="in" class="text-center pt-2">Historial de inscripciones</h3>
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


    <!-- Inscripciones -->
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
            
                @foreach ($usuario->historial_de_inscripciones() as $inscripcion)
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    
</div>

<script>
$(document).ready(function(){


    $('.spin-procesando').click(function(){
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
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    });
});

</script>


@endsection