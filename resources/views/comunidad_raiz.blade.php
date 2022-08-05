@extends('layouts.plantilla')

@section('title', 'Comunidad Raiz')
@section('meta-description', 'metadescripción de la pagina Comunidad Raíz')

@section('content')


<script>
    $(document).ready(function () {

        var div = $("h1");
        div.animate({ left: '150px' }, "slow");
        div.animate({ fontSize: '3em' }, "slow");
    });

    $(document).ready(function () {

        var divi = $("#img2");
        divi.animate({ left: '150px' }, "slow");
        divi.animate({ fontSize: '3em' }, "slow");
    });

</script>


<div>
    <img id="img2" src="/storage/img/casaRaiz.tr.png" class="rounded mx-auto d-block" width="80%">
    <h1 class="text-center">PRESENTA</h1><br>

</div>

<div class="container">
    <div>
        <h1 id="cr" class="text-center"><strong>COMUNIDAD RAIZ</strong></h1><br>
        <h6 id="pcr" class="text-center">La membresia de Casa Raiz es una tarjeta de beneficio que te permite acceder a descuentos en talleres, entradas, tienda y eventos.</h6>
    </div><br><br>

    <div>
        <h2 id="cb" class="text-center">CLUB DE BENEFICIOS</h2>
    </div>
    <div class="card-group">
        <div class="card  text-center" width="8rem">
            <div class="card-body">
                <h5 class="card-title">TALLERES</h5>
                <p class="card-text">10%<br> en todos los talleres<br> de la grilla semanal.</p>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">EVENTOS</h5>
                <p class="card-text">20$ DE DESCUENTO PARA PROGRAMAR TU EVENTO EN EL ESPACIO.</p>
            </div>
        </div>

        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">TIENDA</h5>
                <P class="card-text text-center"> 20% EN PRODUCTOS<br>DE LA TIENDA RAIZ</P>
            </div>
        </div>
    </div><br>
    
    <div class="card-group">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">ENTRADAS</h5>
                <P class="card-text text-center"> 15% EN TODOS LOS EVENTOS CON ENTRADAS</P>
            </div>
        </div>
        <div class="card  text-center" width="10rem">
            <div class="card-body">
                <h5 class="card-title">LUDOTECA</h5>
                <p class="card-text">PUEDES USAR LOS JUEGOS DE NUESTRA LUDOTECA</p>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">BIBLIOTECA</h5>
                <p class="card-text">ACCESO A NUESTROS LIBROS  Y TEXTOS</p>
            </div>
        </div>
        
    </div><br><br>

    <div>
        <h2 id="cb" class="text-center">MEMBRESIAS</h2><br>


        <div class="containerr">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <button class="btn btn-outline-light  btn-lg" style="background-color:rgb(208, 121, 89)"
                        type="button" data-toggle="collapse" data-target="#funciona" aria-controls="MultiCollapse1"
                        aria-expanded="false">SEMILLA</button>
                </div>
                <div class="col-sm-4 text-center">
                    <button class="btn btn-outline-light btn-lg" style="background-color:rgb(208, 121, 89);"
                        type="button" data-toggle="collapse" data-target="#red" aria-controls="MultiCollapse2"
                        aria-expanded="false">RAÍZ</button>
                    
                </div>

                <div class="col-sm-4 text-center">
                    <button class="btn btn-outline-light btn-lg" style="background-color: rgb(208, 121, 89)"
                        type="button" data-toggle="collapse" data-target="#tambien" aria-controls="MultiCollapse3"
                        aria-expanded="false">ÁRBOL</button>
                </div>
            </div>

        </div>


        <div class="container ">
            <div class="row justify-content-center ">

                <div class="col-sm-8 collapse multi-collapse px-1 ml-5 mr-5 mt-5 mb-3" id="funciona"
                    style="color: #f3f3ff">
                   <br> <h2 class="text-center">SEMILLA</h2>
                    <p>MEMBRESÍA INDIVIDUAL, TE PERMITE ACCEDER A TODOS LOS BENEFICIOS DE LA COMUNIDAD DURANTE UN
                        AÑO.</p>
                    <div class="text-center">
                        <button class="btn btn-outline-light  btn-lg text-center"
                            style="background-color:rgb(208, 121, 89)" type="button" data-toggle="collapse"
                            data-target="#funciona" aria-controls="MultiCollapse1"
                            aria-expanded="false">OBTENER</button><br><br>
                    </div>
                </div>

                <div class="col-sm-4 collapse multi-collapse  px-1" id="red" style="color: #f3f3ff">
                   <br> <h3 class="text-center">RAÍZ</h3>
                    <p>MEMBRESÍA PARA DOS PERSONAS, DURANTE UN AÑO, QUE TE PERMITE ACCEDER A TODOS LOS VENEFICIOS DE
                        LA COMUNIDAD JUNTO A UN VINCULO.</p>
                    <div class="text-center">
                        <button class="btn btn-outline-light  btn-lg" style="background-color:rgb(208, 121, 89)"
                            type="button" data-toggle="collapse" data-target="#funciona"
                            aria-controls="MultiCollapse1" aria-expanded="false">OBTENER</button><br><br>
                    </div>

                </div>
                <div class="col-sm-4 collapse multi-collapse px-1" id="tambien" style="color: #f3f3ff">
                   <br> <h3 class="text-center">ÁRBOL</h3>
                    <p>MEMBRESÍA FAMILIAR POR DOS AÑOS, PARA FAMILIAS DE HASTA 6 INTEGRANTES, CON TODOS LOS
                        BENEFICIOS PARA CADA UNO.</p><BR>
                    <div class="text-center">
                        <button class="btn btn-outline-light btn-lg" style="background-color:rgb(208, 121, 89)"
                            type="button" data-toggle="collapse" data-target="#funciona"
                            aria-controls="MultiCollapse1" aria-expanded="false">OBTENER</button><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>




{{--<div>
    <h1>pagina /comunidad_raiz</h1>

    @if (Auth::check())
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>--}}

@endsection