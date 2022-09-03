@extends('layouts.plantilla')

@section('title', 'Inscripciones')
@section('meta-description', 'metadescripción de la pagina de Inscripciones')


@section('content')
    

    <div class="text-center my-4">
        <h1 id="in" class="text-center pt-2">INSCRIPCIONES</h1>
    </div>


    <div class="container">

        <table class="table table-striped table-hover table-smm">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Inscripción</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    
                </tr>
            </thead>
            <tbody>
            
                @foreach ($inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->id }}</td>
                        <td>{{ $inscripcion->nombre }}</td>
                        <td>{{ $inscripcion->inscripto_a() }}</td>
                        <td>{{ $inscripcion->correo }}</td>
                        <td>{{ $inscripcion->telefono }}</td>
                        <td>{{ $inscripcion->created_at->format('d/m/Y') }}</td>



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

        <!-- Botones de paginacion -->
        {{--{{ $eventos->links('pagination::bootstrap-4') }} --}}
   
    </div>

@endsection

