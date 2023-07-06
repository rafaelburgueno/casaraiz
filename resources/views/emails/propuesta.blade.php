<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de emprendedores</title>
</head>
<body>
    <h1>Formulario para emprendedores</h1>
    <ul>
        <li>Nombre: {{ $propuesta['nombre'] }}</li>

        <li>Correo: {{ $propuesta['correo'] }}</li>

        @if( isset($propuesta['nombre_del_emprendimiento']) )
            <li>Nombre del emprendimiento: {{ $propuesta['nombre_del_emprendimiento'] }}</li>
        @endif

        {{-- TODO: mostrar la imagenasociada a la propuesta
        @if( isset($propuesta['imagen']) )
            <li><img src="{{$producto->multimedias->last()->url}}" class="card-img-top" alt="..."></li>
        @endif
        --}}
        
        @if( isset($propuesta['telefono']) )
            <li>Teléfono: {{ $propuesta['telefono'] }}</li>
        @endif

        @if( isset($propuesta['redes_sociales']) )
            <li>Redes sociales: {{ $propuesta['redes_sociales'] }}</li>
        @endif

        @if( isset($propuesta['descripcion']) )
            <li>Descripción de la propuesta: {{ $propuesta['descripcion'] }}</li>
        @endif

        @if( isset($propuesta['forma_de_colaboracion']) )
            <li>Forma de colaboración: {{ $propuesta['forma_de_colaboracion'] }}</li>
        @endif


    </ul>


    {{--<p>{{ json_encode($propuesta, true) }}</p>--}}

</body>
</html>