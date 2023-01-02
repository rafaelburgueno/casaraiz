@extends('layouts.plantilla')

@section('title', 'Comunidad Raiz')
@section('meta-description', 'metadescripción de la pagina Comunidad Raíz')

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
    <h1 class="text-center">PRESENTA</h1><br>
</div>

<div class="container">
    <div style="">
        <h1 id="cr" class="text-center"><strong>COMUNIDAD RAIZ</strong></h1><br>
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

            </div>
            <br><br>


            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            <!--  ----------FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->
            <div class="modal fade" id="contacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <button type="submit" class="btn btn-tarjetas" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--  ----------FIN DEL FORMULARIO DATOS MEMBRESIA -------- ------ ----- -->


        </div>

    </div>
</div>





@endsection
