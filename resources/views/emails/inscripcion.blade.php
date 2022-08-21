<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de Inscripción</title>
</head>
<body>
    <h1>Información de la inscripción:</h1>
    <ul>
        <li>Nombre: {{ $inscripcion['nombre'] }} {{ $inscripcion['apellido'] }}</li>
        <li>Solicita inscribirse al {{ $evento->tipo }}: {{$evento['nombre'] }} (id: {{ $evento->id }})</li>

        <li>Correo: {{ $inscripcion['correo'] }}</li>

        @if( isset($inscripcion['documento']) )
            <li>Documento: {{ $inscripcion['documento'] }}</li>
        @endif
        
        <li>Teléfono: {{ $inscripcion['telefono'] }}</li>
        
        @if( isset($inscripcion['medio_de_pago']) )
            <li>Medio de pago: {{ $inscripcion['medio_de_pago'] }}</li>
        @endif

    </ul>


    {{--<p>{{ json_encode($inscripcion, true) }}</p>--}}

</body>
</html>