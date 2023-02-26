<!-- ---- ---- --- FOOTER  ---- FOOTER----- FOOTER---- FOOTER-->
<!-- ---- ---- --- FOOTER  ---- FOOTER----- FOOTER---- FOOTER-->
<!-- ---- ---- --- FOOTER  ---- FOOTER----- FOOTER---- FOOTER-->
<!-- ---- ---- --- FOOTER  ---- FOOTER----- FOOTER---- FOOTER-->
<footer class="p-3 mt-5" style="{{request()->routeIs('talleres') || request()->routeIs('agenda') ? 'background-image: linear-gradient(to right,  rgb(174, 94, 101), rgb(246, 142, 99), rgb(174, 94, 101));' : 'background-image: linear-gradient(to bottom right, rgb(198, 98, 103), rgb(198,98,103), rgb(48, 66, 60));'}}">
    
    <div class="row d-flex">

        <div class="col-sm-4 d-flex flex-column">
            <p><a href="https://www.facebook.com/casaraizuy" target="_blank">Facebook</a></p>
            <p><a href="https://www.instagram.com/casaraizuy" target="_blank">Instagram</a></p>
            <p><a href="https://wa.me/59899303966" target="_blank">WhatsApp</a></p>
            <p><a href="#" class="" data-toggle="modal" data-target="#cooperacion" id="contactobtn">¿Te interesa participar como emprendimiento colaborador?</a></p>


            <address>
            <p>Maciel y Av. Treinta y Tres</p>
            <p> (+598) 99 303 966</p>
            <p><a href="mailto:casaraizuy@gmail.com">casaraizuy@gmail.com</a></p>
            </address>
        </div>

        <div class="col-sm-4 d-flex flex-column align-items-center">
            <a href="/" class="">
            <img src="/storage/img/Raiz.logo.redondo (1).png" class="img-fluid"
                style="display: block;margin-left: auto;margin-right: auto;" width="60%">
            </a>
        </div>

        <div class="col-sm-4 d-flex flex-column align-items-end">
            <p><a href="{{route('home')}}">Inicio</a></p>
            <p><a href="{{route('casa_raiz')}}">Casa Raiz</a></p>
            <p><a href="{{route('comunidad_raiz')}}">Comunidad Raiz</a></p>
            <p><a href="{{route('talleres')}}">Talleres</a></p>
            <p><a href="{{route('agenda')}}">Agenda</a></p>
            <p><a href="{{route('tienda')}}">Tienda</a></p>
            {{--<p><a href="{{route('blog.index')}}">Blog</a></p>--}}
        </div>

    </div>

    <div class="text-center">
      <p class="small">© 2023 {{env('APP_NAME')}}</p>
    </div>
  
</footer>




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
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
                    non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <form action="{{route('propuesta')}}" method="POST" {{--onsubmit="return validarPropuesta()"--}} class="was-validatedd" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!--Input Nombre_del_emprendimiento -->
                    <div class="form-group">
                        {{--<label for="nombre_del_emprendimiento">Nombre del emprendimiento: </label>--}}
                        <input required type="text" class="form-control" id="nombre_del_emprendimiento" name="nombre_del_emprendimiento" value="{{old('nombre_del_emprendimiento')}}" placeholder="Nombre del emprendimiento">
                        @error('nombre_del_emprendimiento')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Input nombre -->
                    <div class="form-group">
                        {{--<label for="nombre">Nombre del referente: </label>--}}
                        <input required type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Nombre">
                        @error('nombre')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!--Input correo -->
                    <div class="form-group ">
                        {{--<label for="correo">Correo: </label>--}}
                        <input required type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="Correo">
                        @error('correo')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                        
                    <!--Input telefono -->
                    <div class="form-group">
                        {{--<label for="telefono">Teléfono: </label>--}}
                        <input required type="number" class="form-control" min="1111111" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="Teléfono">
                        @error('telefono')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Input redes_sociales -->
                    <div class="form-group">
                        {{--<label for="redes_sociales">redes_sociales: </label>--}}
                        <input required type="text" class="form-control" id="redes_sociales" name="redes_sociales" value="{{old('redes_sociales')}}" placeholder="Redes sociales">
                        @error('redes_sociales')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="imagen text-muted">Logo <small>(opcional)</small>: </label>
                        <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                        @error('imagen')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!--Input descripción de la propuesta -->
                    <div class="form-group">
                        {{--<label for="comentario">Descripcion de la propuesta: </label>--}}
                        <textarea class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}"
                            placeholder="Contanos sobre tu emprendimiento y/o propuesta." rows="4"></textarea>
                    </div>
                
                    
                    <button type="submit" class="btn btn-tarjetas btn-block" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FIN DEL FORMULARIO DE COLABORACION -->

