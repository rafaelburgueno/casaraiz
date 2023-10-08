<div>
    
    <form wire:submit.prevent="guardar">


        <!-- Nombre -->
        <div class="form-group mb-3">
            <label for="nombre" class="negro">Nombre completo <small>(Obligatorio)</small>: </label>
            <input type="text" pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{3,100}" class="form-control" name="nombre" wire:model="nombre" id="nombre" placeholder="Ingrese su nombre">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- apellido -->
        {{--<div class="form-group mb-3">
            <label for="apellido" class="negro">Apellido: </label>
            <input type="text" pattern="[A-Za-z0-9 ÁáÉéÍíÓóÚúÜüÑñ]{3,100}" class="form-control" name="apellido" wire:model="apellido" id="apellido" placeholder="Ingrese su apellido">
            @error('apellido') <span class="text-danger">{{ $message }}</span> @enderror
        </div>--}}

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email" class="negro">Email <small>(Obligatorio)</small>: </label>
            <input type="email" class="form-control" name="correo" wire:model="correo" id="correo" placeholder="Ingrese su correo">
            @error('correo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>


        <!-- Telefono -->
        <div class="form-group mb-3">
            <label for="telefono">Teléfono <small>(Obligatorio)</small>: </label>
            <input type="text" pattern="^(09\d{7}|[42]\d{7})$" class="form-control" name="telefono" wire:model="telefono" id="telefono" placeholder="Ingrese su número de telefono" 
            title="El número de teléfono debe comenzar con '09', '2' o '4' segiodo de 7 numeros."required>
            @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Documento -->
        {{--<div class="form-group mb-3">
            <label for="documento">Documento <small>(Obligatorio)</small>: </label>
            <input type="text" class="form-control" name="documento" wire:model="documento" id="documento" placeholder="sin puntos ni guión" required>
            @error('documento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>--}}



        <!--Input type select tipo_de_membresia -->
        {{--<div class="form-group mb-3">
            <label for="tipo_de_membresia">Tipo de membresía <small>(Obligatorio)</small>: </label>
            <select class="form-control mb-3" wire:model.defer="tipo_de_membresia" name="tipo_de_membresia" id="tipo_de_membresia" required>
                <option value="semilla">Semilla $700 (1 usuario)</option>
                <option value="raiz">Raiz $1100 (2 usuarios)</option>
                <option value="arbol">Árbol $2000 (grupo familiar hasta 6 usuarios)</option>
            </select>
        </div>--}}

        <div class="form-group mb-3">
            <label for="tipo_de_membresia">Tipo de membresía <small>(Obligatorio)</small>: </label>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="tipo_de_membresia" wire:model="tipo_de_membresia" wire:change="onMedioDePagoChange" @checked(old('tipo_de_membresia')) id="checkbox-semilla" value="semilla">
                <label class="form-check-label" for="checkbox-semilla">Semilla $700 (1 usuario)</label>
            </div>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="tipo_de_membresia" wire:model="tipo_de_membresia" wire:change="onMedioDePagoChange" @checked(old('tipo_de_membresia')) id="checkbox-raiz" value="raiz">
                <label class="form-check-label" for="checkbox-raiz">Raiz $1100 (2 usuarios)</label>
            </div>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="tipo_de_membresia" wire:model="tipo_de_membresia" wire:change="onMedioDePagoChange" @checked(old('tipo_de_membresia')) id="checkbox-arbol" value="arbol">
                <label class="form-check-label" for="checkbox-arbol">Árbol $2000 (grupo familiar hasta 6 usuarios)</label>
            </div>
            @error('tipo_de_membresia') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!--Input medio_de_pago -->
        <div class="form-group mb-3">
            <label for="comentario">Medio de pago <small>(Obligatorio)</small>: </label>
            <div class="form-check">
                <input onclick="definirBotonDeSubmit()" required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" wire:change="onMedioDePagoChange" @checked(old('medio_de_pago')) id="efectivo" value="efectivo">
                <label class="form-check-label" for="efectivo">Efectivo</label>
            </div>
            {{--<div class="form-check">
                <input onclick="definirBotonDeSubmit()" required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" @checked(old('medio_de_pago')) id="midinero" value="midinero">
                <label class="form-check-label" for="midinero">MiDinero</label>
            </div>--}}
            <div class="form-check">
                <input onclick="definirBotonDeSubmit()" required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" wire:change="onMedioDePagoChange" @checked(old('medio_de_pago')) id="mercadopago" value="mercadopago">
                <label class="form-check-label" for="mercadopago">Pagar online</label>
            </div>
            <div class="form-check">
                <input onclick="definirBotonDeSubmit()" required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" wire:change="onMedioDePagoChange" @checked(old('medio_de_pago')) id="prex" value="prex">
                <label class="form-check-label" for="prex">Prex / MiDinero</label>
            </div>
            <div class="form-check">
                <input onclick="definirBotonDeSubmit()" required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" wire:change="onMedioDePagoChange" @checked(old('medio_de_pago')) id="canje/sorteo" value="canje/sorteo">
                <label class="form-check-label" for="canje/sorteo">Canje/Sorteo</label>
            </div>
            @error('medio_de_pago') <span class="text-danger">{{ $message }}</span> @enderror
        </div>


        <!--Aceptar terminos y condiciones -->
        <div class="form-group mb-3">
            <input @checked(old('terminos_y_condiciones')) required type="checkbox"  class="h1" wire:model="terminos_y_condiciones" name="terminos_y_condiciones" value="1" id="terminos_y_condiciones" checked>
            <label class="mb-0" for="terminos_y_condiciones">Acepto los <a href="#" data-toggle="modal" data-target="#modal_terminos_y_condiciones">términos y condiciones</a>.</label>
            @error('terminos_y_condiciones') <p class="p-0 m-0 text-danger">{{ $message }}</p> @enderror
        </div>


        {{--<script>
            $(document).ready(function() {
                /*$('#boton_de_mercadopago').hide();
                $('#boton_de_efectivo').hide();*/

                $('input[type=radio][name=medio_de_pago]').click(function(event) {
                    event.stopPropagation();
                    var medioPago = $("input[name='medio_pago']:checked").val();

                    /*if (medioPago == 'mercadopago') {
                        $('#boton_de_mercadopago').fadeIn();
                        $('#boton_de_efectivo').fadeOut();
                    }
                    else if (medioPago == 'efectivo') {
                        $('#boton_de_efectivo').fadeIn();
                        $('#boton_de_mercadopago').fadeOut();
                    }*/



                    // Obtener el valor del radio button
                    var medioPago = $("input[name='medio_pago']:checked").val();

                    // Mostrar el botón de enviar según el medio de pago seleccionado
                    if (medioPago == "mercadopago") {
                    $("#boton_de_mercadopago").show();
                    $("#boton_de_efectivo").hide();
                    } else {
                    $("#boton_de_mercadopago").hide();
                    $("#boton_de_efectivo").show();
                    }




                });
            });
        </script>--}}



        {{--<label for="password" class="negro">Contraseña: </label>
        <div class="form-row mb-3">
            <div class="col-sm-6 form-group mb-0">
                <input type="password" class="mx-0 form-control password_confirmacion" name="password" wire:model="password" id="password" placeholder="Contraseña">
            </div>
            
            <div class="col-sm-6 form-group mb-0 mt-1">
                <input type="password" class="mx-0 form-control password_confirmacion " wire:model="password_confirmation" placeholder="Confirmar contraseña">
            </div>
            @error('password') <span class="mx-1 text-danger">{{ $message }}</span> @enderror
        </div>--}}
        
        <hr class="w-50 mt-44">

        <div class="text-center">

            <div wire:loading>
                <div class="spinner-border my-3" style="width: 50px; height: 50px;" role="status">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
            
            <a id="link-solicitar" wire:click="guardar" {!! $atributos_del_link_de_pago !!} class="btn btn-tarjetas text-light btn-block">Guardar</a>
        
            {!! $respuesta !!}

            @if (session()->has('exito'))
                <div class="my-3 alert alert-success">
                    {{ session('exito') }}
                </div>
            @endif


            
        </div>

        

        
    </form>


</div>
