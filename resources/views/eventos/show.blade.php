@extends('layouts.plantilla')

@section('title', $evento->nombre)
@section('meta-description', $evento->descripcion)


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">FICHA DEL EVENTO</h1>
</div>


<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                @if (count($evento->multimedias))
                <img src="{{$evento->multimedias->last()->url}}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <p class="card-text ">{{$evento->dia_de_semana}} de {{$evento->hora_de_inicio}} a {{$evento->hora_de_fin}}hs.</p>
                    
                    <h5 class="card-title  my-1 text-dark">{{$evento->nombre}}</h5>

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text"><small>Inscripcion </small>
                            @if ($evento->costo_de_inscripcion == 0)
                                <span class="">Gratuita</span>
                            @else
                                <strong> ${{$evento->costo_de_inscripcion}}</strong>
                            @endif
                        </p>
                        
                        <small class="">{{ $evento->cupos_totales }} cupos</p>
                    </div>
                    
                    
                    <p class="">{{ ucfirst($evento->tipo) }} a cargo de {{$evento->responsable}}</p>
                    
                    <p>Espacio: {{ $evento->lugar }}</p>

                    @if(!$evento->activo)
                        <div class="float-right m-0 p-0 pr-3"><span class="badge badge-danger">El evento no es público</span></div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center">
                    
                    @if (count($evento->categorias))
                        <p>Categoria: {{ $evento->categorias }}</p>
                    @endif
                        
                        <p class="">Creado: <small>{{$evento->created_at}}</small></p>
                    </div>
                    
                    
                    <p class="h5 mt-3">{{$evento->descripcion}}</p>

                </div>
                
                {{-- Esta se mostrara solamente al administrador --}}
                @if(Auth::check() && Auth::user()->rol == 'administrador')
                <div class="d-flex justify-content-between align-items-center p-1">
                    <a href="{{route('talleres')}}" class="btn btn-outline-secondary ">< Volver</a>
                    <a href="{{route('eventos.edit', $evento)}}" class="btn btn-outline-secondary ">Editar ></a>
                </div>
                @endif
                
            </div>
        </div>

        <div class="col-md-2"></div>

        
    </div>      
    

</div>
    


@endsection