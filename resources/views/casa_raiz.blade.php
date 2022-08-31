@extends('layouts.plantilla')

@section('title', 'Sobre Casa Raíz')
@section('meta-description', 'metadescripción de la pagina Sobre Casa Raíz')

@section('content')


<!-- Imagen apaisada con logo -->
<div>
	<img src="{{asset('/storage/img/nav.10.png')}}" class="d-block w-100" alt="...">
</div>



<div class="container mt-5">
    <div id="myDIV" class="card" width="18rem" style="opacity:95%;   background-image: linear-gradient(to bottom right, rgb(48, 66, 60), rgb(198, 98, 103), rgb(198, 158, 98));">
        <img class="card-img-top" src="{{asset('/storage/img/casa.png')}}" alt="Card image cap">

        <h1 class="card-header text-center" style="color: #eaf0e4;">
            Casa Raíz es un espacio cultural ,
        </h1>
        <div class="card-body text-center">
            <h3 class="card-title " style="color: #f0b6be">ubicado en La Floresta, Uruguay</h3><br>
            <h3 class="card-text " style="color: #f8f0f1">en el cual se
                desarrollan <br>diversos talleres y eventos culturales.
            </h3><br>

        </div>
    </div><br>

</div>
    <div class="container video-responsive mt-3">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/dKoQzOjflLo"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>







@endsection