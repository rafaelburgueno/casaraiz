<nav class="navbar navbar-light  navbar-expand-md site-header sticky-top fixed-top" id="nav">
    <a class="navbar-brand navbar-logo" href="{{route('home')}}"><img src="/storage/img/logo.png"></a>
    <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('casa_raiz') ? 'active' : ''}}" href="{{route('casa_raiz')}}"><strong>CasaRaíz</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('comunidad_raiz') ? 'active' : ''}}" href="{{route('comunidad_raiz')}}"><strong>Comunidad raíz</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('talleres') ? 'active' : ''}}" href="{{route('talleres')}}"><strong>Talleres</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('eventos.*') ? 'active' : ''}}" href="{{route('eventos.index')}}"><strong>Agenda</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('posts.*') ? 'active' : ''}}" href="{{route('blog.index')}}"><strong>Blog</strong></a>
            </li>

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

@if (request()->routeIs('home') || request()->routeIs('talleres'))
{{--<div class="p-5"></div>--}}
<div>
    <img src="/storage/img/nav.10.png" class="nav d-block w-100" alt="...">
  </div>
@endif


<div class="p-4"></div>



  

{{--
<hr>
<nav>

    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('casa_raiz') }}">casa_raiz</a></li>
        <li><a href="{{ route('comunidad_raiz') }}">comunidad_raiz</a></li>
        <li><a href="{{ route('talleres') }}">Talleres</a></li>
        <li><a href="{{ route('agenda') }}">agenda</a></li>
        <li><a href="{{ route('tienda') }}">tienda</a></li>
        <li><a href="{{ route('blog') }}">blog</a></li>
        <li><a href="{{ route('perfil') }}">perfil</a></li>
        <li><a href="{{ route('login') }}">login</a></li>
        <li><a href="{{ route('register') }}">register</a></li>
        <li><a href="{{ route('dashboard') }}">dashboard</a></li>
        <li><a href="{{ route('logout') }}">logout</a></li>

    </ul>

</nav>--}}