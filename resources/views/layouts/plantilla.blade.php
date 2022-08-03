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
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!--script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!--Style-->
    <!--<link href="public/css/index.css" rel="stylesheet">-->
    {{--<link href="{{ asset('/css/index.css')}}" rel="stylesheet">--}}
    
</head>
<body class="{{request()->routeIs('comunidad_raiz') ? 'mi-bg-gradient' : ''}}">

    <!-- Header -->
    @include('partials.nav')

    <hr>

    <!-- Navigation -->
    @yield('content')
    


    <!-- Footer -->
    {{--@include('layouts.partials.footer')--}}

    <!-- Scripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    {{--<script src="{{ asset('/js/index.js')}}"></script>--}}

</body>
</html>