<nav class="navbar navbar-light  navbar-expand-xl site-header sticky-top fixed-top" id="nav" style="{{request()->routeIs('talleres') || request()->routeIs('agenda') ? 'background-image: linear-gradient(to right,  rgb(174, 94, 101), rgb(246, 142, 99), rgb(174, 94, 101));' : ''}}"> 
    <a class="navbar-brand navbar-logo" href="{{route('home')}}"><img src="{{asset('/storage/img/logo_ultimo.png')}}"></a>
    <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: black; {{request()->routeIs('casa_raiz') ? 'opacity:60%;' : ''}}" href="{{route('casa_raiz')}}"><strong>casaRAÍZ</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black; {{request()->routeIs('comunidad_raiz') ? 'opacity:60%;' : ''}}" href="{{route('comunidad_raiz')}}"><strong>Comunidad Raíz</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black; {{request()->routeIs('talleres') ? 'opacity:60%;' : ''}}" href="{{route('talleres')}}"><strong>Talleres</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black; {{request()->routeIs('agenda') ? 'opacity:60%;' : ''}} {{request()->routeIs('eventos.*') ? 'opacity:60%;' : ''}} " href="{{route('agenda')}}"><strong>Agenda</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: black; {{request()->routeIs('tienda') ? 'opacity:60%;' : ''}}" href="{{route('tienda')}}"><strong>Tienda</strong></a>
            </li>

            @if(Auth::check() && ( Auth::user()->rol == 'administrador' || Auth::user()->rol == 'colaborador' ))
                <li class="nav-item">
                    <a class="nav-link" style="color: black; {{request()->routeIs('blog.*') ? 'opacity:60%;' : ''}}" href="{{route('blog.index')}}"><strong>Blog</strong></a>
                </li>
            @endif

            @if( Auth::check() )
                @if( Auth::user()->rol == 'administrador' )
                    <li class="nav-item dropdown">
                        <a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Admin</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('mi_perfil')}}">Mi perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('eventos.index')}}">Eventos</a>
                            <a class="dropdown-item" href="{{route('productos.index')}}">Productos</a>
                            <a class="dropdown-item" href="{{route('usuarios.index')}}">Usuarios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('inscripciones.index')}}">Inscripciones y solicitudes</a>
                            <a class="dropdown-item" href="{{route('banner.index')}}">Banner de inicio</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('cerrar_sesion')}}">Salir</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>Perfil</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('mi_perfil')}}">Mi perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('carrar_sesion')}}">Salir</a>
                        </div>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" style="color: black;" href="{{route('login')}}"><strong>Iniciar sesión</strong></a>
                </li>
            @endif

            {{--@if( Auth::check() )
            <li class="nav-item">
                <a style="color: black;" class="nav-link" href="{{route('carrar_sesion')}}"><strong>Salir</strong></a>
            </li>
            @endif--}}

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

