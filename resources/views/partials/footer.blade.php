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
            <p><a href="{{route('comunidad_raiz')}}/#membresia_agua" class="" {{--data-toggle="modal" data-target="#cooperacion" id="contactobtn"--}}>¿Te interesa ser colaborador?</a></p>
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
                <p class="text-center">Sumate como emprendedor de la comunidad.
                    Completa los datos y nos comunicamos contigo.
                </p>

                <form action="{{route('propuestas.store')}}" method="POST" {{--onsubmit="return validarPropuesta()"--}} class="was-validatedd" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!--Input Nombre_del_emprendimiento -->
                    <div class="form-group">
                        <label for="nombre_del_emprendimiento">Nombre del emprendimiento: </label>
                        <input required type="text" class="form-control" id="nombre_del_emprendimiento" name="nombre_del_emprendimiento" value="{{old('nombre_del_emprendimiento')}}" placeholder="...">
                        @error('nombre_del_emprendimiento')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Input nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre del referente: </label>
                        <input required type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="...">
                        @error('nombre')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!--Input correo -->
                    <div class="form-group ">
                        <label for="correo">Correo: </label>
                        <input required type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="...">
                        @error('correo')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                        
                    <!--Input telefono -->
                    <div class="form-group">
                        <label for="telefono">Teléfono: </label>
                        <input required type="number" class="form-control" min="1111111" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="09XXXXXXX">
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
                            <input type="text" class="form-control" id="redes_sociales" name="redes_sociales" value="{{old('redes_sociales')}}" placeholder="...">
                            @error('redes_sociales')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group mb-3">
                        <label for="imagen" class="text-muted">Logo <small>(opcional)</small>: </label>
                        <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                        @error('imagen')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!--Input descripción de la propuesta -->
                    <div class="form-group">
                        {{--<label for="comentario">Descripcion de la propuesta: </label>--}}
                        <textarea required class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}"
                            placeholder="Contanos sobre tu emprendimiento y/o propuesta." rows="4"></textarea>
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
                document.getElementById("nombre_del_emprendimiento").value != '' &&  
                document.getElementById("nombre").value != '' &&
                document.getElementById("correo").value != '' &&
                document.getElementById("telefono").value >= 10000000 &&
                document.getElementById("descripcion").value != ''
            ){

            
                let timerInterval
                Swal.fire({
                title: 'Procesando',
                html: 'Por favor espere.',
                //timer: 10000,
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