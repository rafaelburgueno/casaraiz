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


    <!--Summernote-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    


    <!--Style-->
    <!--<link href="public/css/index.css" rel="stylesheet">-->
    <link href="{{ asset('/css/index.css')}}" rel="stylesheet">
    
    
    
</head>
<body class="{{request()->routeIs('comunidad_raiz') ? 'mi-bg-gradient' : ''}}">

    <!-- Header -->
    @include('partials.nav')

    <!-- Estos estilos son necesarios para que el editor funcione correctamente -->
	<style>
		.card{
			opacity: initial;
            background-image:linear-gradient( white, white);
            flex: 1 0;
            margin-top: 0;
            margin-right: 0;
            margin-left: 0;
		}
		.modal-dialog{
			color:rgb(46, 46, 46);
		}
		.note-placeholder{
			color:rgb(46, 46, 46);
		}
	</style>


    <!-- contenido -->
    @yield('content')
    


    <!-- Footer -->
    {{--@include('layouts.partials.footer')--}}

    <!-- Scripts -->
    

    <!-- JavaScript Bundle with Popper -->
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>--}}
    


    
    <script src="{{ asset('/js/index.js')}}"></script>

    <script>
        $('#summernote').summernote({
          placeholder: '...',
          tabsize: 2,
          height: 300
        });
      </script>

</body>
</html>