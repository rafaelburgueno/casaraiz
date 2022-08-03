@extends('layouts.plantilla')

@section('title', 'Sobre Casa Raíz')
@section('meta-description', 'metadescripción de la pagina Sobre Casa Raíz')

@section('content')


<div class="container mt-5 opacity-75">
    <div id="myDIV" class="card" width="18rem" style="opacity:95%; background-color:#f3f3ff; color: #293762">
        <img class="card-img-top" src="/storage/img/nieve.jpg" alt="Card image cap">

        <h1 class="card-header text-center font-monospace fs-2" style="color: #2b2e28;">
            <strong> Nace en noviembre de 2018 con el nombre <br><strong>"LE RANCHE"</strong>
        </h1>
        <div class="card-body text-center">
            <h3 class="card-title font-monospace fs-1" style="color: #f0b6be">Un espacio cultural, autogestivo
                ubicado en La FLoresta, Uruguay.</h3><br>
            <h2 class="card-text ">Trabajando de forma colaborativa para lograr los mejores resultados.</h2><br>

        </div>
    </div><br>


    <div id="myDIV" class="card" width="18rem" width="18rem" style="opacity:95%; background-color:#f3f3ff; color: #293762">
        <img src="/storage/img/dibujos.jpg" class="card-img-top" alt="Responsive">

        <h1 class="card-header text-center font-monospace fs-2" style="color: #2b2e28;">
            <strong> Nace en noviembre de 2018 con el nombre <br><strong>"LE RANCHE"</strong>
        </h1>
        <div class="card-body text-center">
            <h3 class="card-title font-monospace fs-1" style="color: #dc6272">Un espacio cultural, autogestivo
                ubicado en La FLoresta, Uruguay.</h3><br>
            <h2 class="card-text ">Trabajando de forma colaborativa para lograr los mejores resultados.</h2><br>

        </div>
    </div><br>

    <div id="myDIV" class="card" width="18rem" style="opacity:95%; background-color:#f3f3ff; color: #293762">
        <h1 class="card-header text-center font-monospace fs-2" style="color: #2b2e28;">
            <strong> Nace en noviembre de 2018 con el nombre <br><strong>"LE RANCHE"</strong>
        </h1>
        <div class="card-body text-center">
            <h3 class="card-title font-monospace fs-1" style="color: #dc6272">Un espacio cultural, autogestivo
                ubicado en La FLoresta, Uruguay.</h3><br>
            <h2 class="card-text ">Trabajando de forma colaborativa para lograr los mejores resultados.</h2><br>

        </div>
    </div><br>


    <div id="myDIV" class="card" width="18rem" style="opacity:95%; background-color:#f3f3ff; color: #293762">
        <h1 class="card-header text-center font-monospace fs-2" style="color: #2b2e28;">
            <strong> Nace en noviembre de 2018 con el nombre <br><strong>"LE RANCHE"</strong>
        </h1>
        <div class="card-body text-center">
            <h3 class="card-title font-monospace fs-1" style="color: #dc6272">Un espacio cultural, autogestivo
                ubicado en La FLoresta, Uruguay.</h3><br>
            <h2 class="card-text ">Trabajando de forma colaborativa para lograr los mejores resultados.</h2><br>

        </div>
    </div><br>


    <div id="myDIV" class="card" width="18rem" style="opacity:95%; background-color:#f3f3ff; color: #293762">
        <h1 class="card-header text-center font-monospace fs-2" style="color: #2b2e28;">
            <strong> Nace en noviembre de 2018 con el nombre <br><strong>"LE RANCHE"</strong>
        </h1>
        <div class="card-body text-center">
            <h3 class="card-title font-monospace fs-1" style="color: #dc6272">Un espacio cultural, autogestivo
                ubicado en La FLoresta, Uruguay.</h3><br>
            <h2 class="card-text ">Trabajando de forma colaborativa para lograr los mejores resultados.</h2><br>

        </div>
    </div><br>


    <div id="" class="card card-verde">
        <h1 class="card-header text-center text- font-monospace fs-2">
            Nos contactamos por la plataforma que prefieras,
        </h1>
        <div class="card-body text-center text-">
            <h3 class="card-title font-monospace fs-1">seremos fluidos en la comunicación</h3><br>
            <h2 class="card-text">para ir definiendo las partes del proceso.</h2><br>
            <!--<button class="btn btn-lg btn-secondary btn-verde">Boton de prueba</button>
            <button class="btn btn-lg btn-outline-secondary btn-outline-verde">Boton de prueba</button>-->
        </div>
    </div><br>


    <div id="" class="card card-gris">
        <h1 class="card-header text-center  font-monospace fs-2">
            Para concretar una entrevista y/o solicitar un presupuesto:
        </h1>
        <div class="card-body text-center ">
            <h3 class="card-title font-monospace fs-1">Primero completa los datos de tu proyecto </h3><br>
            <h2 class="card-text">y luego tus datos de contacto <br>en la seccion:</h2><br>
            <a href="" class="btn btn-lg btn-secondary btn-gris">Armar mi
                proyecto</a><br>
            <!--<button class="m-3 btn btn-lg btn-secondary btn-gris">Boton de prueba</button>
            <button class="m-3 btn btn-lg btn-outline-secondary btn-outline-gris">Boton de prueba</button>-->
        </div>
    </div><br>


    <div id="" class="card card-azul">
        <h1 class="card-header text-center  font-monospace fs-1">Creamos contenido para que tengas toda la
            info que necesitás</h1>
        <div class="card-body text-center ">
            <h3 class="card-title font-monospace fs-2"> antes de definir que tipo de proyecto querés.
            </h3><br>
            <a href="" class="btn btn-outline-secondary btn-azul btn-lg"><strong>Todo lo
                    que tengo
                    que
                    saber
                </strong></a><br>
            <!--<button class="m-3 btn btn-lg btn-secondary btn-azul">Boton de prueba</button>
                <button class="m-3 btn btn-lg btn-outline-secondary btn-outline-azul">Boton de prueba</button>-->
        </div>
    </div><br><br>
</div>


{{--<div>
    <h1>pagina /casa_raiz</h1>

    @if (Auth::check())
        <div>{{ Auth::user()->name }}</div>
    @else
        <p>no estas logueado.</p>
    @endif
</div>--}}


@endsection