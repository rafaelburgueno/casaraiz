<nav class="navbar navbar-light  navbar-expand-md site-header sticky-top fixed-top" id="nav">
    <a class="navbar-brand navbar-logo" href="{{route('home')}}"><img src="{{asset('/storage/img/logo.png')}}"></a>
    <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" style=" {{request()->routeIs('casa_raiz') ? 'opacity:60%;' : ''}}" href="{{route('casa_raiz')}}"><strong>CasaRaíz</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style=" {{request()->routeIs('comunidad_raiz') ? 'opacity:60%;' : ''}}" href="{{route('comunidad_raiz')}}"><strong>Comunidad raíz</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style=" {{request()->routeIs('talleres') ? 'opacity:60%;' : ''}}" href="{{route('talleres')}}"><strong>Talleres</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style=" {{request()->routeIs('agenda') ? 'opacity:60%;' : ''}} {{request()->routeIs('eventos.*') ? 'opacity:60%;' : ''}} " href="{{route('agenda')}}"><strong>Agenda</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style=" {{request()->routeIs('tienda.*') ? 'opacity:60%;' : ''}}" href="{{route('tienda.index')}}"><strong>Tienda</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style=" {{request()->routeIs('blog.*') ? 'opacity:60%;' : ''}}" href="{{route('blog.index')}}"><strong>Blog</strong></a>
            </li>


            @if( Auth::check() && Auth::user()->rol == 'administrador' )
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrador
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a>
                        <a class="dropdown-item" href="{{route('eventos.index')}}">Eventos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Alguna funcionalidad más...</a>
                    </div>
                </li>
            @endif

            @if( Auth::check() )
            <li class="nav-item">
                <a class="nav-link" href="{{route('carrar_sesion')}}"><strong>Cerrar sesión</strong></a>
            </li>
            @endif

        </ul>
    </div>

</nav>




{{--<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand navbar-logo" href="{{route('home')}}"><img src="/storage/img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('casa_raiz') ? 'active' : ''}}" href="{{route('casa_raiz')}}">CasaRaíz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('comunidad_raiz') ? 'active' : ''}}" href="{{route('comunidad_raiz')}}">Comunidad raíz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('talleres') ? 'active' : ''}}" href="{{route('talleres')}}">Talleres</a>
                    </li>
                    {{--<li class="nav-item">
                        <a class="nav-link {{request()->routeIs('eventos.*') ? 'active' : ''}}" href="{{route('eventos.index')}}">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('tienda.*') ? 'active' : ''}}" href="{{route('tienda.index')}}">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('posts.*') ? 'active' : ''}}" href="{{route('posts.index')}}">Blog</a>
                    </li>--}}
                    {{--<li class="nav-item">
                        <a class="nav-link {{request()->routeIs('contacto.*') ? 'active' : ''}}" href="{{route('contacto.index')}}">Contacto</a>
                    </li>--}}
                    {{--@if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('logout')}}">Admin</a>
                        </li>
                    @endif
                    {{--<li class="nav-item">
                        <a class="nav-link {{request()->routeIs('perfil') ? 'active' : ''}}" href="{{route('perfil.index')}}">Perfil</a>
                    </li>--}}
                {{--</ul>
        
            </div>
        </div>
    </nav>
</header>--}}

{{--<div class="p-4"></div>--}}

