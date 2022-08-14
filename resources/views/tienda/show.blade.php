@extends('layouts.plantilla')
{{-- la variable que contiene la instancia de producto, se llama $tienda 
    porque sino se generan problemasen el controlador --}}
@section('title', $tienda->nombre)
@section('meta-description', $tienda->descripcion)


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">TIENDA</h1>
</div>


<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                @if (count($tienda->multimedias))
                <img src="{{$tienda->multimedias->last()->url}}" class="card-img-top" alt="...">
                @endif

                <div class="card-body">
                    
                    <p class="h3"><strong> ${{$tienda->precio}}</strong></p>
                    
                    
                    <h5 class="card-title text-dark my-1">{{$tienda->nombre}}</h5>
                    
                    @if($tienda->proveedor)
                    <p class="">De la mano de {{$tienda->proveedor}}</p>
                    @endif
                    
                    <p class="h5 my-3">{{$tienda->descripcion}}</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        @if (count($tienda->categorias))
                        <p>Categorias: {{ $tienda->categorias }}</p>
                        @endif
                    </div>
                    
                    {{-- Esta se mostrara solamente al administrador --}}
                    @if(Auth::check() && Auth::user()->rol == 'administrador')
                        @if(!$tienda->activo)
                            <p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-dark">Tenemos {{ $tienda->stock }} unidades.</small>
                            <small class="text-dark">Creado el {{$tienda->created_at}}</small>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('tienda.index')}}" class="btn btn-outline-secondary text-dark">< Volver</a>
                            <a href="{{route('tienda.edit', $tienda)}}" class="btn btn-outline-secondary text-dark">Editar ></a>
                        </div>
                    @endif
                
                </div>
                        
            </div>
        </div>

        <div class="col-md-2"></div>

        
    </div>      
    

</div>


@endsection