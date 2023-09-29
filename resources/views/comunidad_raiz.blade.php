@extends('layouts.plantilla')

@section('title', 'Comunidad Raiz')
@section('meta-description', 'Explora las posibilidades culturales de Casa Raíz. Con nuestra suscripción, tendrás descuentos en talleres y eventos culturales. Además de disfrutar beneficios y promociones en nuestra tienda. ¡No esperes más y unite a Comunidad Raíz!')

@section('content')


<script>
    $(document).ready(function () {

        var div = $("h1");
        div.animate({ left: '150px', fontSize: '3em' }, "slow");

        var divi = $("#img2");
        divi.animate({ left: '150px', fontSize: '3em' }, "slow", social());

        function social(){
            //console.log("si ajecuta la funcion social()");
            $(".social").animate({right: "-120px"}, "fast");
        }
    
    });

</script>

<!-- social -->
@include('partials.social')

<div style="">
    <img id="img2" src="{{asset('/storage/img/logo.comunidad (1).png')}}" class="rounded mx-auto d-block" width="80%">
    {{--<h1 class="text-center">PRESENTA</h1><br>--}}
</div>

<div class="container">
    <div style="">
        {{--<h1 id="cr" class="text-center"><strong>COMUNIDAD RAIZ</strong></h1><br>--}}
        <h6 id="pcr" class="text-center">
            Comunidad Raíz es una red de beneficios, que mediante una tarjeta personal,
            permite a sus usuarios acceder a descuentos en Casa Raíz, así como también en 
            los distintos emprendimientos adheridos.
            Impulsamos la autogestión y la colaboración entre artistas, talleristas, emprendedores y toda la
            comunidad.
        </h6>
    </div><br><br>


    <div class="">
        <h2 id="cb" class="text-center">CLUB DE BENEFICIOS</h2>
    </div>

    <div class="card-group">
        <div class="card text-center card-beneficioss" width="8rem" 
        style="box-shadow: 4px 4px 2px #e9e2e2; background-image: linear-gradient(to bottom left, rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));">
            <div class="card-body">
                <h5 class="card-title">TALLERES</h5>
                <p class="card-text">-10%<br> en todos los talleres<br> de la grilla semanal.</p>
            </div>
        </div>

        <div class="card text-center card-beneficioss" 
        style="box-shadow: 4px 4px 2px #e9e2e2; background-image: linear-gradient(to bottom right,rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));">
            <div class="card-body">
                <h5 class="card-title">EVENTOS</h5>
                <p class="card-text">-20% <br>para programar tu evento en el espacio.</p>
            </div>
        </div>

        <div class="card text-center card-beneficioss" 
        style="box-shadow: 4px 4px 2px #e9e2e2; background-image: linear-gradient(to bottom left, rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));">
            <div class="card-body">
                <h5 class="card-title">TIENDA</h5>
                <P class="card-text text-center"> -20%<br> en los productos<br>de la tienda raíz.</P>
            </div>
        </div>

    </div>
    
    <div class="card-group">
        <div class="card text-center card-beneficioss" 
        style="box-shadow: 4px 4px 2px #e9e2e2; background-image: linear-gradient(to top left,rgb(198, 98, 103), rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));">
            <div class="card-body">
                <h5 class="card-title">ENTRADAS</h5>
                <P class="card-text text-center">-15% <br>en todos los eventos con entrada.</P>
            </div>
        </div>

        <div class="card text-center card-beneficioss" width="10rem" 
        style="box-shadow: 4px 4px 2px #e9e2e2; background-image: linear-gradient(to top right,rgb(198, 98, 103), rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));">
            <div class="card-body">
                <h5 class="card-title">LUDOTECA</h5>
                <p class="card-text">Podes usar todos los juegos de nuestra ludoteca.</p>
            </div>
        </div>

        <div class="card text-center card-beneficioss" 
        style="box-shadow: 4px 4px 2px #e9e2e2; background-image: linear-gradient(to top left, rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));">
            <div class="card-body">
                <h5 class="card-title">BIBLIOTECA</h5>
                <p class="card-text">Tenés acceso a todos nuestros libros y textos.</p>
            </div>
        </div>
        
    </div>
    <br id="membresias_ruta">
    <br>




    <div>
        <h2 id="cb" class="text-center">MEMBRESÍAS</h2><br>
        <div class="container border border-3">
            <div class="row">

                <div class="col-md-4">
                    <div class="card div1">
                        <div class="card-body">
                            <h5 class="card-title text-center">SEMILLA</h5>
                            <p class="card-text text-center">Membresía individual,<br> durante un año, que te permite acceder a
                                todos los beneficios de la comunidad.</p>
                            <h4 class="text-center"><strong>$700 </strong><span style="font-size: 50%;">( anual )</span></h4><br>
                            <div class="text-center">
                                <button type="button" class="btn btn-tarjetas" data-toggle="modal" data-target="#contacto" id="contactobtn">
                                    OBTENER</button><br><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card div2">
                        <div class="card-body">
                            <h5 class="card-title text-center">RAÍZ</h5>
                            <p class="card-text text-center">Membresía para dos personas,
                                durante un año, que te permite acceder a todos los beneficios de la comunidad junto a
                                un vinculo.
                            </p>
                            <h4 class="text-center"><strong>$1100 </strong><span style="font-size: 50%;">( anual )</span></h4><br>
                            <div class="text-center">
                                <button type="button" class="btn btn-tarjetas" data-toggle="modal" data-target="#contacto" id="contactobtn">
                                    OBTENER
                                </button><br><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card div3">
                        <div class="card-body">
                            <h5 class="card-title text-center">ÁRBOL</h5>
                            <p class="card-text text-center">Membresía familiar por un año, para familias de hasta 4 integrantes,
                                con todos los beneficios para cada uno.</p>
                            <h4 class="text-center"><strong>$2000 </strong><span style="font-size: 50%;">( anual )</span></h4><br>
                            <div class="text-center">
                                <button type="button" class="btn btn-tarjetas" data-toggle="modal" data-target="#contacto" id="contactobtn">
                                    OBTENER
                                </button><br><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div  id="membresia_agua"></div>

                <div class="col-md-3"></div>

                <div class="col-md-6">
                    <div class="card div4">
                        <div class="card-body">
                            <h5 class="card-title text-center">AGUA</h5>
                            <p class="card-text text-center">Si tenes un emprendimiento podes sumarte a los beneficios de la comunidad.<br> Ser
                                emprendimiento colaborador es apoyar la conexion y asociación entre proyectos
                                locales.</p>
                            <div class="text-center">
                                <button type="button" class="btn btn-tarjetas" {{--style="background-color: rgb(220, 43, 20); color: #e9e2e2;"--}} data-toggle="modal" data-target="#cooperacion" id="contactobtn">REGISTRARME</button>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>

            </div>
            <br><br>


            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            {{--<div class="modal fade" id="contacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Completa tus datos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('obtener_membresia')}}" method="POST" onsubmit="return validateForm(1)" class="was-validatedd">
                            <div class="modal-body">


                                @csrf
                                @method('POST')
                                <div class="form-row">

                                    <!-- Input nombre -->
                                    <div class="form-group col-sm-6">
                                        <label for="nombre1">Nombre: </label>
                                        <input required type="text" class="form-control" id="nombre1" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
                                        @error('nombre')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!--Input apellido -->
                                    <div class="form-group col-sm-6">
                                        <label for="apellido1">Apellido: </label>
                                        <input required type="text" class="form-control" id="apellido1" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
                                        @error('apellido')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!--Input correo -->
                                <div class="form-group ">
                                    <label for="correo1">Correo: </label>
                                    <input required type="email" class="form-control" id="correo1" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
                                    @error('correo')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form row">

                                    <!--Input documento -->
                                    <div class="form-group col-sm-6">
                                        <label for="documento1">Documento: </label>
                                        <input required type="number" min="1111111" max="999999999" class="form-control" id="documento1" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
                                    </div>
                                    
                                    <!--Input telefono -->
                                    <div class="form-group col-sm-6">
                                        <label for="telefono1">Celular: </label>
                                        <input required type="number" class="form-control" min="1111111" id="telefono1" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
                                        @error('telefono')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><br>

                                <!--Input tipo_de_membresia -->
                                <div class="form-group">
                                    <label for="">Tipo de membresia: </label>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="semilla" value="semilla">
                                        <label class="form-check-label" for="semilla">Semilla (1 usuario)</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="raiz" value="raiz">
                                        <label class="form-check-label" for="raiz">Raiz (2 usuarios)</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="arbol" value="arbol">
                                        <label class="form-check-label" for="arbol">Árbol (grupo familiar hasta 6 usuarios)</label>
                                    </div>
                                    @error('tipo_de_membresia')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div><br>

                                <!--Input medio_de_pago -->
                                <div class="form-group">
                                    <label for="comentario">Medio de pago: </label>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo" value="efectivo">
                                        <label class="form-check-label" for="efectivo">Efectivo</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero" value="midinero">
                                        <label class="form-check-label" for="midinero">MiDinero</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex" value="prex">
                                        <label class="form-check-label" for="prex">Prex</label>
                                    </div>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo" value="canje/sorteo">
                                        <label class="form-check-label" for="canje/sorteo">Canje/Sorteo</label>
                                    </div>
                                </div><br>

                                <!--Input interes -->
                                <div class="form-group">
                                    <label for="comentario">¿A qué taller(es) te gustaría acceder? </label><br>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="interes1" @checked(old('interes1')) id="teatro" value="teatro">
                                        <label class="form-check-label" for="teatro">Teatro</label><br>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="interes2" @checked(old('interes2')) id="yoga" value="yoga">
                                        <label class="form-check-label" for="yoga">Yoga</label><br>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="interes3" @checked(old('interes3')) id="costura" value="costura">
                                        <label class="form-check-label" for="costura">Costura</label><br>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="interes4" @checked(old('interes4')) id="armonizacion_y_danza" value="armonizacion y danza">
                                        <label class="form-check-label" for="armonizacion_y_danza">Armonización y danza</label><br>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="interes5" @checked(old('interes5')) id="murga_para_niños" value="murga para niños">
                                        <label class="form-check-label" for="murga_para_niños">Murga para niñxs</label><br>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="interes6" @checked(old('interes6')) id="canto" value="canto">
                                        <label class="form-check-label" for="canto">Canto</label><br>
                                    </div>
                                </div>

                                <!--Input comentario -->
                                <div class="form-group">
                                    <label for="comentario">Comentario: </label>
                                    <textarea class="form-control" id="comentario" name="comentario" value="{{old('comentario')}}"
                                        placeholder="Ingrese su comentario" rows="4"></textarea>
                                </div>

                                <!--Input recibir_novedades -->
                                <div class="form-group pl-3">
                                    <div class="form check pl-1">
                                        <input type="checkbox" class="form-check-input" name="recibir_novedades" @checked(old('recibir_novedades')) value="1" id="recibir_novedades" checked>
                                        <label class="form-check-label" for="recibir_novedades">Quiero recibir las novedades</label>
                                    </div>
                                </div>
                            

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-tarjetas" id="enviar">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>--}}
            <!--  ----------FIN DEL FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->

            

            <!--  ----------NUEVO FORMULARIO DE MEMBRESIA -------- ------ ----- -->
            <!--  ----------NUEVO FORMULARIO DE MEMBRESIA -------- ------ ----- -->
            <!--  ----------NUEVO FORMULARIO DE MEMBRESIA -------- ------ ----- -->
            <!--  ----------NUEVO FORMULARIO DE MEMBRESIA -------- ------ ----- -->
            <div class="modal fade" id="contacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <div class="px-4">
                                <h3 id="modalMisDatosLabel" class="text-lg">Completa tus datos</h3>
                                {{--<p class="mt-1 text-sm">
                                    Actualice la información de perfil de su cuenta.
                                </p>--}}
                            </div>
                        

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borrar()">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                        <div class="modal-body ">


                            @livewire('formulario-de-membresia')
                            {{-- EDICION DE DATOS DEL USUARIO --}}
                            

                            {{--
                            <button class="btn shadown" style="color:#f04643;">Modificar</button>
                            <button class="btn btn-outline shadown " style="color: #4554a4; ">Guardar</button>
                            --}}
                        </div>
                        
                    </div>


                </div>
            </div>
            <!-- ----------FIN DEL NUEVO FORMULARIO DE MEMBRESIA  -------- ------ ----- -->

            

        </div>

    </div>
    <br><br>


    <!--EMPRENDIMIENTOS--EMPRENDIMIENTOS---EMPRENDIMIENTOS---EMPRENDIMIENTOS-->
    <div>
        <h2 id="cb" class="text-center">EMPRENDIMIENTOS</h2><br><br>
    </div>

    <div>
        <h6 id="pcr" class="text-center">Podes obtener beneficios, descuentos, 2x1, sorteos, etc, con nuestros
            emprendimientos adheridos a la comunidad. <br>Consumí artesanal, consumí local.
        </h6>
    </div><br>

    <div class="card-group row">

        @foreach ($emprendimientos as $emprendimiento)
        <div class="col-md-4">
            
            <div style="background-image: linear-gradient(to bottom left, rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));" class="card  text-center" width="8rem">
                <div class="card-body" style="  box-shadow: 4px 4px 2px #e9e2e2;">
                    <h6 class="card-title">{{$emprendimiento->nombre_del_emprendimiento}}</h6>
                    @if ($emprendimiento->imagen)
                        <img src="{{$emprendimiento->imagen->url}}" width="" class="img-fluid rounded mb-3" alt="logo de {{$emprendimiento->nombre_del_emprendimiento}}">
                    @endif
                    <br>
                    <h5><strong>{{$emprendimiento->beneficio}}</strong></h5>

                    @if($emprendimiento->redes_sociales)
                    <a href="https://www.facebook.com/{{$emprendimiento->redes_sociales}}" target="_blank" class="icon-facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/{{$emprendimiento->redes_sociales}}" target="_blank" class="icon-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                    @endif
                    {{--
                    <a href="youtube.com/channel/UCB9yNMFrFhVcIMamA4G1UIw" target="_blank" class="icon-googleplus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>--}}
                    @if($emprendimiento->telefono)
                    <a href="https://wa.me/{{$emprendimiento->telefono}}" target="_blank" class="icon-pinterest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                    </a>
                    @endif
                    
                    <a href="mailto:{{$emprendimiento->correo}}" class="icon-mail"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>
        @endforeach

        {{--<div class="col-md-4">
            <div style="background-image: linear-gradient(to bottom left, rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));" class="card  text-center" width="8rem">
                <div class="card-body" style="  box-shadow: 4px 4px 2px #e9e2e2;">
                    <h6 class="card-title">Juguetes del sol</h6>
                    <img src="{{asset('/storage/img/Logo.png')}}" width="50%" class="" alt="Responsive">
                    <br>
                    <h5> -20% </h5>

                    <a href="https://www.facebook.com/casaraizuy" target="_blank" class="icon-facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/casaraizuy" target="_blank" class="icon-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                    <a href="youtube.com/channel/UCB9yNMFrFhVcIMamA4G1UIw" target="_blank" class="icon-googleplus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>
                    <a href="https://wa.me/59899303966" target="_blank" class="icon-pinterest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                    </a>
                    <a href="mailto:sofia.16d@gmail.com" class="icon-mail"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div style="background-image: linear-gradient(to bottom left, rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));" class="card  text-center" width="8rem">
                <div class="card-body" style="  box-shadow: 4px 4px 2px #e9e2e2;">
                    <h5 class="card-title">Zaz Rest</h5>
                    <img src="{{asset('/storage/img/rest-logo.png')}}" width="60%" class="" alt="Responsive">
                    <br>
                    <h5> -20% </h5>

                    <a href="https://www.facebook.com/casaraizuy" target="_blank" class="icon-facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/casaraizuy" target="_blank" class="icon-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                    <a href="youtube.com/channel/UCB9yNMFrFhVcIMamA4G1UIw" target="_blank" class="icon-googleplus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>
                    <a href="https://wa.me/59899303966" target="_blank" class="icon-pinterest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                    </a>
                    <a href="mailto:sofia.16d@gmail.com" class="icon-mail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                    </a>

                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div style="background-image: linear-gradient(to bottom left, rgb(198, 98, 103),rgb(198, 98, 103), rgb(198, 98, 103), rgb(48, 66, 60));" class="card  text-center" width="8rem">
                <div class="card-body" style="  box-shadow: 4px 4px 2px #e9e2e2;">
                    <h5 class="card-title">La coral</h5>
                    <img src="{{asset('/storage/img/coral logo (1).png')}}" width="52%" class="" alt="Responsive">
                    <br>
                    <h5><strong>-20%</strong></h5>

                    <a href="https://www.facebook.com/casaraizuy" target="_blank" class="icon-facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/casaraizuy" target="_blank" class="icon-twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                    <a href="youtube.com/channel/UCB9yNMFrFhVcIMamA4G1UIw" target="_blank" class="icon-googleplus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>
                    <a href="https://wa.me/59899303966" target="_blank" class="icon-pinterest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                    </a>
                    <a href="mailto:sofia.16d@gmail.com" class="icon-mail">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                    </a>

                </div>

            </div>
        </div>
        --}}

    </div>
    <br>

    <!-- MODAL FORMULARIO DE COLABORACION -->
    <!-- MODAL FORMULARIO DE COLABORACION -->
    <!-- MODAL FORMULARIO DE COLABORACION -->
    <div class="modal fade" id="cooperacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Emprendimiento Colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Sumate como emprendedor de la comunidad.
                        Completa los datos y nos comunicamos contigo.
                    </p>

                    <form action="{{route('propuestas.store')}}" method="POST" {{--onsubmit="return validarPropuesta()"--}} class="was-validatedd" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!--Input Nombre_del_emprendimiento -->
                        <div class="form-group">
                            <label for="nombre_del_emprendimiento">Nombre del emprendimiento <small>(Obligatorio)</small>: </label>
                            <input required pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{6,100}" type="text" class="form-control" id="nombre_del_emprendimiento" name="nombre_del_emprendimiento" value="{{old('nombre_del_emprendimiento')}}" placeholder="...">
                            @error('nombre_del_emprendimiento')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Input nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre del referente <small>(Obligatorio)</small>: </label>
                            <input required pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{6,100}" type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="...">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!--Input correo -->
                        <div class="form-group ">
                            <label for="correo">Correo <small>(Obligatorio)</small>: </label>
                            <input required type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="...">
                            @error('correo')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                            
                        <!--Input telefono -->
                        <div class="form-group">
                            <label for="telefono">Teléfono: </label>
                            <input type="text" class="form-control" pattern="(?=^.{8,15}$)\+?\d{1,4}[-\s]?\d{1,4}[-\s]?\d{1,4}" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="09XXXXXXX">
                            @error('telefono')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Input redes_sociales -->
                        <div class="form-group mb-3">
                            <label for="redes_sociales">Redes sociales: </label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input pattern="^[^@]{5,100}$" type="text" class="form-control" id="redes_sociales" name="redes_sociales" value="{{old('redes_sociales')}}" placeholder="...">
                                @error('redes_sociales')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="imagen" class="text-muted">Logo: </label>
                            <input type="file" class="form-control p-1" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                            @error('imagen')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>


                        <!--Input descripción de la propuesta -->
                        <div class="form-group">
                            <label for="comentario">Contanos sobre tu emprendimiento y/o propuesta <small>(Obligatorio)</small>: </label>
                            <textarea required max="1000" class="form-control" id="descripcion" name="descripcion" placeholder="{{old('descripcion', '...')}}" rows="4"></textarea>
                        </div>

                        <!-- selecciona la forma en que te gustaria colaborar -->
                        <div class="form-group">
                            <label for="forma_de_colaboracion">Forma de colaboración: </label>
                            <select required class="form-control" id="forma_de_colaboracion" name="forma_de_colaboracion">
                                {{--<option value="">Selecciona una opción</option>--}}
                                <option value="Productos del emprendimiento">Productos del emprendimiento</option>
                                <option value="Aporte económico">Aporte económico</option>
                                <option value="Talleres">Talleres</option>
                                <option value="Charlas">Charlas</option>
                                <option value="Asesoramiento">Asesoramiento</option>
                                <option value="Otro">Otro</option>
                                
                            </select>
                        </div>
                    
                        
                        <button type="submit" class="btn btn-tarjetas btn-block btn-procesando" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DEL FORMULARIO DE COLABORACION -->


    <script>
        $(document).ready(function(){

            $('.btn-procesando').click(function(){
                if(
                    document.getElementById("nombre_del_emprendimiento").validity.valid &&  
                    document.getElementById("nombre").validity.valid && 
                    document.getElementById("correo").validity.valid &&
                    //document.getElementById("telefono").validity.valid &&
                    document.getElementById("descripcion").validity.valid &&
                    document.getElementById("forma_de_colaboracion").validity.valid
                ){

                
                    let timerInterval
                    Swal.fire({
                    title: 'Procesando',
                    html: 'Por favor espere.',
                    timer: 18000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                    })
                }
            });
        });
        
    </script>

    <!--MODAL DATOS SUSCRIPCIÓN -- MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN-->
    <!--MODAL DATOS SUSCRIPCIÓN -- MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN--MODAL DATOS SUSCRIPCIÓN-->
    @if ($errors->any())
    <script>
        //sweet alert informando que hay errores en el formulario del club macanudo
        var errores = @json($errors->all());
        //console.log(errores);
        var erroresStr = "";
        // itero el array de errores y lo agrego a la variable erroresStr
        errores.forEach(function(elemento, indice, array) {
            erroresStr += '* ' + elemento + ". ";
        });

        Swal.fire({
            icon: 'error',
            title: 'Hay errores en los datos ingesados en el formulario.',
            text: erroresStr
        })

    </script>

    @endif



</div>





@endsection
