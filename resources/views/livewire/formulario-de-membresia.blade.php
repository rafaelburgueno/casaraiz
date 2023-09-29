<div>
    
    <form wire:submit.prevent="guardar">


        <!-- Nombre -->
        <div class="form-group mb-3">
            <label for="nombre" class="negro">Nombre completo: </label>
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
            <label for="telefono">Teléfono: </label>
            <input type="text" pattern="^(09\d{7}|[42]\d{7})$" class="form-control" name="telefono" wire:model="telefono" id="telefono" placeholder="Ingrese su número de telefono" 
            title="El número de teléfono debe comenzar con '09', '2' o '4' segiodo de 7 numeros."required>
            @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Documento -->
        <div class="form-group mb-3">
            <label for="documento">Documento: </label>
            <input type="text" class="form-control" name="documento" wire:model="documento" id="documento" placeholder="sin puntos ni guión" required>
            @error('documento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>



        <!--Input tipo_de_membresia -->
        <div class="form-group">
            <label for="">Tipo de membresia: </label>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="tipo_de_membresia" wire:model="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="semilla" value="semilla">
                <label class="form-check-label" for="semilla">Semilla $700 (1 usuario)</label>
            </div>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="tipo_de_membresia" wire:model="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="raiz" value="raiz">
                <label class="form-check-label" for="raiz">Raiz $1100 (2 usuarios)</label>
            </div>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="tipo_de_membresia" wire:model="tipo_de_membresia" @checked(old('tipo_de_membresia')) id="arbol" value="arbol">
                <label class="form-check-label" for="arbol">Árbol $2000 (grupo familiar hasta 6 usuarios)</label>
            </div>
            @error('tipo_de_membresia') <span class="text-danger">{{ $message }}</span> @enderror
        </div><br>

        <!--Input medio_de_pago -->
        <div class="form-group">
            <label for="comentario">Medio de pago: </label>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo" value="efectivo">
                <label class="form-check-label" for="efectivo">Efectivo</label>
            </div>
            {{--<div class="form-check">
                <input required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" @checked(old('medio_de_pago')) id="midinero" value="midinero">
                <label class="form-check-label" for="midinero">MiDinero</label>
            </div>--}}
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" @checked(old('medio_de_pago')) id="mercadopago" value="mercadopago">
                <label class="form-check-label" for="mercadopago">Pagar online</label>
            </div>
            {{--<div class="form-check">
                <input required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" @checked(old('medio_de_pago')) id="prex" value="prex">
                <label class="form-check-label" for="prex">Prex</label>
            </div>--}}
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="medio_de_pago" wire:model="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo" value="canje/sorteo">
                <label class="form-check-label" for="canje/sorteo">Canje/Sorteo</label>
            </div>
            @error('medio_de_pago') <span class="text-danger">{{ $message }}</span> @enderror
        </div><br>





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
        
        <hr class="w-50 mt-4">

        <div class="text-center">
            @if($ver_boton_de_guardar)
                <button type="submit" class="btn btn-tarjetas" wire:click="guardar">Guardar</button>
            @endif

            @if (session()->has('exito'))
                <div class="my-3 alert alert-success">
                    {{ session('exito') }}
                </div>
            @endif

            @if($abilitar_boton_de_pago)
                {!! $respuesta !!}
            @endif

            
        </div>

        

        
    </form>


</div>
