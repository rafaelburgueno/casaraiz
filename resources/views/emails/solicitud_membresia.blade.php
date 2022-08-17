<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email de Contacto</title>
</head>
<body>
    <h1>Informacion de la solicitud:</h1>
    <ul>
        <li>Nombre: {{ $solicitud['nombre'] }}</li>
        <li>Apellido: {{ $solicitud['apellido'] }}</li>
        <li>Tipo_de_membresia: {{ $solicitud['tipo_de_membresia'] }}</li>

        <li>Correo: {{ $solicitud['correo'] }}</li>

        <li>Teléfono: {{ $solicitud['telefono'] }}</li>
        <li>Documento: {{ $solicitud['documento'] }}</li>
        <li>Medio de pago: {{ $solicitud['medio_de_pago'] }}</li>

        <li>Comentario: {{ $solicitud['comentario'] }}</li>
        <li>Deseo recibir novedades: {{ $solicitud['recibir_novedades'] }}</li>


    </ul>


    <p>{{ json_encode($solicitud, true) }}</p>

</body>
</html>