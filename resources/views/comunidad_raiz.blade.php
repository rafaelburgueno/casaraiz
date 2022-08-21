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
    <img id="img2" src="{{asset('/storage/img/casaRaiz.tr.png')}}" class="rounded mx-auto d-block" width="80%">
    <h1 class="text-center">PRESENTA</h1><br>
</div>

<div class="container">
    <div>
        <h1 id="cr" class="text-center"><strong>COMUNIDAD RAIZ</strong></h1><br>
        <h6 id="pcr" class="text-center">
            Comunidad Raíz es una red de beneficios, que mediante una tarjeta personal,
            permite a sus usuarios acceder a descuentos en Casa Raíz, así como también en 
            los distintos emprendimientos adheridos.
            Impulsamos la autogestión y la colaboración entre artistas, talleristas, emprendedores y toda la
            comunidad.
        </h6>
    </div><br><br>


    <div class="mb-3">
        <h2 id="cb" class="text-center">CLUB DE BENEFICIOS</h2>
    </div>

    <div class="card-group my-3">
        <div class="card text-center mx-2 card-beneficios" width="8rem">
            <div class="card-body">
                <h5 class="card-title text-dark">TALLERES</h5>
                <p class="card-text text-dark">10%<br> en todos los talleres<br> de la grilla semanal.</p>
            </div>
        </div>

        <div class="card text-center mx-2 card-beneficios">
            <div class="card-body">
                <h5 class="card-title  text-dark">EVENTOS</h5>
                <p class="card-text  text-dark">20$ DE DESCUENTO PARA PROGRAMAR TU EVENTO EN EL ESPACIO.</p>
            </div>
        </div>

        <div class="card text-center mx-2 card-beneficios">
            <div class="card-body">
                <h5 class="card-title text-dark">TIENDA</h5>
                <P class="card-text text-center text-dark"> 20% EN PRODUCTOS<br>DE LA TIENDA RAIZ</P>
            </div>
        </div>

    </div>
    
    <div class="card-group my-3">
        <div class="card text-center mx-2 card-beneficios">
            <div class="card-body">
                <h5 class="card-title text-dark">ENTRADAS</h5>
                <P class="card-text text-center text-dark"> 15% EN TODOS LOS EVENTOS CON ENTRADAS</P>
            </div>
        </div>

        <div class="card text-center mx-2 card-beneficios" width="10rem">
            <div class="card-body">
                <h5 class="card-title text-dark">LUDOTECA</h5>
                <p class="card-text text-dark">PUEDES USAR LOS JUEGOS DE NUESTRA LUDOTECA</p>
            </div>
        </div>

        <div class="card text-center mx-2 card-beneficios">
            <div class="card-body">
                <h5 class="card-title text-dark">BIBLIOTECA</h5>
                <p class="card-text text-dark">ACCESO A NUESTROS LIBROS  Y TEXTOS</p>
            </div>
        </div>
        
    </div><br><br>




    <div>
        <h2 id="cb" class="text-center">MEMBRESIAS</h2><br>
        <div class="container border border-3-danger pt-3">
            <div class="row">

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center" style=" color: brown;">SEMILLA</h5>
                            <p class="card-text">
                                Membresía individual, durante un año, que te permite acceder a todos 
                                los beneficios de la comunidad.
                            </p>
                            <div class="text-center mt-3">
                                <button type="button" class="btn " style="background-color: coral; color: #e9e2e2;" data-toggle="modal" data-target="#contacto" id="contactobtn">
                                    OBTENER
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center" style=" color: brown;">RAÍZ</h5>
                            <p class="card-text">
                                Membresía para dos personas, 
                                durante un año, que te permite acceder a todos los beneficios de la comunidad 
                                junto a un vinculo.
                            </p>
                            <div class="text-center mt-3">
                                <button type="button" class="btn " style="background-color: coral; color: #e9e2e2;" data-toggle="modal" data-target="#contacto" id="contactobtn">
                                    OBTENER
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center" style=" color: brown;">ÁRBOL</h5>
                            <p class="card-text">
                                MEMBRESÍA FAMILIAR POR DOS AÑOS, PARA FAMILIAS DE HASTA 6
                                INTEGRANTES, CON TODOS LOS
                                BENEFICIOS PARA CADA UNO.
                            </p>
                            <div class="text-center mt-3">
                                <button type="button" class="btn " style="background-color: coral; color: #e9e2e2;" data-toggle="modal" data-target="#contacto" id="contactobtn">
                                    OBTENER
                                </button>
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
                        <form action="{{route('obtener_membresia')}}" method="POST">
                            <div class="modal-body">


                                @csrf
                                @method('POST')
                                <div class="form-row">

                                    <div class="form-group col-sm-6">
                                        <label for="nombre">Nombre: </label>
                                        <input required type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
                                        @error('nombre')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="apellido">Apellido: </label>
                                        <input required type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
                                        @error('apellido')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="correo">Correo: </label>
                                    <input required type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
                                    @error('correo')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form row">
                                    <div class="form-group col-sm-6">
                                        <label for="nombre">Documento: </label>
                                        <input required type="number" class="form-control" id="documento" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
                                    
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="telefono">Celular: </label>
                                        <input required type="tel" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
                                        @error('telefono')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <label for="">Tipo de membresia: </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="semilla" value="semilla">
                                        <label class="form-check-label" for="semilla">Semilla (1 usuario)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="raiz" value="raiz">
                                        <label class="form-check-label" for="raiz">Raiz (2 usuarios)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="arbol" value="arbol">
                                        <label class="form-check-label" for="arbol">Árbol (grupo familiar hasta 6 usuarios)</label>
                                    </div>
                                    @error('tipo_de_membresia')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div><br>

                                <div class="form-group">
                                    <label for="comentario">Medio de pago: </label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo" value="efectivo">
                                        <label class="form-check-label" for="efectivo">Efectivo</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero" value="midinero">
                                        <label class="form-check-label" for="midinero">MiDinero</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex" value="prex">
                                        <label class="form-check-label" for="prex">Prex</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo" value="canje/sorteo">
                                        <label class="form-check-label" for="canje/sorteo">Canje/Sorteo</label>
                                    </div>
                                </div><br>


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

                                <div class="form-group">
                                    <label for="comentario">Comentario: </label>
                                    <textarea class="form-control" id="comentario" name="comentario" value="{{old('comendatio')}}"
                                        placeholder="Ingrese su comentario" rows="4"></textarea>
                                </div>
                                <div class="form-group pl-3">
                                    <div class="form check pl-1">
                                        <input type="checkbox" class="form-check-input" name="recibir_novedades" @checked(old('recibir_novedades')) id="check" checked>
                                        <label class="form-check-label" for="check">Quiero recibir las novedades</label>
                                    </div>
                                </div>
                            

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn " style="background-color: coral; color: #e9e2e2;" id="enviar">Enviar</button>
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