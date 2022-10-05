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
            <p>casaraizuy@gmail.com</p>
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
      <p class="small">© 2022 Casa Raiz</p>
    </div>
  
</footer>