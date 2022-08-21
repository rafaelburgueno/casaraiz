<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de solicitud de un producto</title>
</head>
<body>
    <h1>Información de la solicitud:</h1>
    <ul>
        <li>Nombre: {{ $solicitud['nombre'] }} {{ $solicitud['apellido'] }}</li>
        <li>Solicita el producto: {{$producto['nombre'] }} (id: {{ $producto->id }})</li>

        <li>Correo: {{ $solicitud['correo'] }}</li>

        @if( isset($solicitud['documento']) )
            <li>Documento: {{ $solicitud['documento'] }}</li>
        @endif
        
        <li>Teléfono: {{ $solicitud['telefono'] }}</li>
        
        @if( isset($solicitud['medio_de_pago']) )
            <li>Medio de pago: {{ $solicitud['medio_de_pago'] }}</li>
        @endif

    </ul>


    {{--<p>{{ json_encode($solicitud, true) }}</p>--}}

</body>
</html>