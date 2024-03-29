<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casa Raíz - @yield('title')</title>
    <meta name="description" content="@yield('meta-description', 'metadescripción por defecto')">
    <!-- Favicon -->

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <!-- Tailwind -->
    {{--<script src="https://cdn.tailwindcss.com"></script>--}}
    <!-- bootstrap -->
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">--}}

    <!-- Estilos de liwire -->
    @livewireStyles

    <!--script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Bootstrap-->
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Sweet alert 2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Style-->
    <!--<link href="public/css/index.css" rel="stylesheet">-->
    <link href="{{ asset('/css/index.css')}}" rel="stylesheet">
    
</head>
<body style="{{request()->routeIs('comunidad_raiz') ? 'background-image: linear-gradient(to bottom right, rgb(198, 98, 103), rgb(198,98,103), rgb(48, 66, 60));' : ''}}">

    <!-- Header -->
    @include('partials.nav')

    <!-- mensajes de alerta -->
    @include('partials.alertas')


    <!-- contenido -->
    @yield('content')
    


    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>--}}
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    
    <!-- JS livewire -->
    @livewireScripts
    
    <script src="{{ asset('/js/index.js')}}"></script>


</body>
</html>