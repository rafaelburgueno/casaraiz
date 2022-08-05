@extends('layouts.plantilla')

@section('title', $evento->nombre)
@section('meta-description', $evento->descripcion)


@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="h2">Ficha del evento</h1>
        </div>
    </div>  

    <hr class="my-2">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                @if (count($evento->multimedias))
                <img src="{{$evento->multimedias->last()->url}}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <p class="card-text text-light">{{$evento->dia_de_semana}} de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</p>
                    
                    <h5 class="card-title text-light my-1">{{$evento->nombre}}</h5>

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text"><small>Inscripcion </small>
                            @if ($evento->costo_de_inscripcion == 0)
                                <span class="">Gratuita</span>
                            @else
                                <strong> ${{$evento->costo_de_inscripcion}}</strong>
                            @endif
                        </p>
                        <small class="text-light">id: {{$evento->id}}</small>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="">{{ $evento->tipo }} a cargo de {{$evento->responsable}}</p>
                        <small class="text-light">cupos: {{ $evento->cupos_totales }}</p>
                    </div>
                        
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-dark">
                            <p>Espacio: {{ $evento->lugar }}</p>
                            <p>Categoria: {{ $evento->categorias }}</p>
                        </div>
                        
                        <p class="text-light">creado: <small>{{$evento->created_at}}</small></p>
                    </div>
                    
                    <p class="mt-3">Descripcion:</p>
                    <p class="h5">{{$evento->descripcion}}</p>

                </div>
                
                <div class="d-flex justify-content-between align-items-center p-1">
                    <a href="{{route('talleres')}}" class="btn text-light">< Volver</a>
                    <a href="{{route('eventos.edit', $evento)}}" class="btn text-light">editar ></a>
                </div>
                
            </div>
        </div>

        <div class="col-md-2"></div>

        
    </div>      
    

</div>
    


@endsection