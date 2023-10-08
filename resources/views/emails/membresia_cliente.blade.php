<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agradecimiento por la compra de membresía</title>
</head>
<body>
    <h1>¡Gracias por solicitar una membresía {{$membresia}}!</h1>

    <p style='color:#222'>Estimad@ {{ $inscripcion['nombre'] }},</p>

    @if( $inscripcion['medio_de_pago'] == 'efectivo' )
        <p>Podés realizar el pago en Casa Raíz o comunicandote con Rafa personalmente.</p>
    @elseif( $inscripcion['medio_de_pago'] == 'mercadopago' )
        <p>La membresía {{$membresia}} quedara activa cuando se verifique el pago.</p>
    @elseif( $inscripcion['medio_de_pago'] == 'prex' )
        <p>Puedes realizar el pago con Prex o MiDinero, con los siguientes datos:</p>
        <p>Prex: {{ env('CODIGO_DE_PAGO_PREX')}} / Rafael Tellechea </p>
        <p>MiDinero: {{ env('CODIGO_DE_PAGO_MIDINERO')}} / Rafael Tellechea </p>
        <p>La membresía {{$membresia}} quedara activa cuando se verifique el pago.</p>
    @endif

    <p>Esperamos que disfrutes de todos los beneficios que ofrecemos.</p>
    <p>Si tenes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto 
        con nuestro equipo de soporte.</p>
    <p>Saludos cordiales,</p>
    <p>El equipo de Casa Raíz</p>
</body>
</html>
