<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de solicitud de membresía</title>
</head>
<body>
    <h1>Información de la solicitud:</h1>
    <ul>
        <li>Nombre: {{ $solicitud['nombre'] }} {{ $solicitud['apellido'] }}</li>
        <li>Tipo de membresia: {{ $solicitud['tipo_de_membresia'] }}</li>

        <li>Correo: {{ $solicitud['correo'] }}</li>

        @if( isset($solicitud['documento']) )
            <li>Documento: {{ $solicitud['documento'] }}</li>
        @endif
        
        <li>Teléfono: {{ $solicitud['telefono'] }}</li>
        
        @if( isset($solicitud['medio_de_pago']) )
            <li>Medio de pago: {{ $solicitud['medio_de_pago'] }}</li>
        @endif

        @if( isset($solicitud['comentario']) )
            <li>Comentario: {{ $solicitud['comentario'] }}</li>
        @endif

        <li>Deseo recibir novedades: {{ $solicitud['recibir_novedades'] }}</li>
        
        <li>Intereses:</li>
        <ul>

            @if( isset($solicitud['interes1']) )
                <li>{{ $solicitud['interes1'] }}</li>
            @endif
            @if( isset($solicitud['interes2']) )
                <li>{{ $solicitud['interes2'] }}</li>
            @endif
            @if( isset($solicitud['interes3']) )
                <li>{{ $solicitud['interes3'] }}</li>
            @endif
            @if( isset($solicitud['interes4']) )
                <li>{{ $solicitud['interes4'] }}</li>
            @endif
            @if( isset($solicitud['interes5']) )
                <li>{{ $solicitud['interes5'] }}</li>
            @endif
            @if( isset($solicitud['interes6']) )
                <li>{{ $solicitud['interes6'] }}</li>
            @endif
        </ul>


    </ul>


    {{--<p>{{ json_encode($solicitud, true) }}</p>--}}

</body>
</html>