<!--  BANNER AGENDA INICIO-->
@isset($banner)
<div class="container">
    <div id="carouselExampleFade" class="carousel slide carousel-fade align-items-center" data-ride="carousel">
        <div class="carousel-inner ">
            {{--<div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('/storage/img/1.png')}}" alt="First slide">
            </div>--}}
            
            @foreach ($banner as $imagen)
                @if($loop->index == 0)
                <div class="carousel-item active">
                @else
                <div class="carousel-item">
                @endif
                    <img class="d-block w-100" src="{{$imagen->url}}" alt="{{ $imagen->descripcion }}">
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <script> 
    $(document).ready(function(){
        $('.carousel').carousel({
            interval: 10,
        });
    });
    </script>

    {{--request()->routeIs('comunidad_raiz')--}}
    @if( request()->routeIs('home') )
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <a href="{{route('agenda')}}" class="btn btn-lg btn-tarjetas mt-1" style="width: 100%;">
                    Ver actividades
                </a>
            </div>
        </div>
    @endif


</div><br>
@endisset

{{--

<!--  BANNER AGENDA INICIO-->
<div class="containerr">
    <div id="carouselExampleFade" class="carousel slide carousel-fade align-items-center button-container" data-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('/storage/img/1.png')}}" alt="First slide">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/storage/img/2.png')}}">
            </div>
        
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/storage/img/3.png')}}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/storage/img/4.png')}}">

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/storage/img/5.png')}}" alt="Third slide">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/storage/img/4.png')}}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/storage/img/3.png')}}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/storage/img/2.png')}}">
            </div>
        </div>

        <script> 
            $('.carousel').carousel({
                interval: 450
            });
        </script>

    </div>
</div>
--}}