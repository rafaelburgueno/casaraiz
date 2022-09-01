@extends('layouts.plantilla')

@section('title', 'Usuarios')
@section('meta-description', 'metadescripción de la pagina de Usuarios')


@section('content')
    

    <div class="my-2">
        <h1 id="in" class="text-center pt-2">Banner</h1>
    </div>


    <!-- Carousel -->
    <div class="d-flex justify-content-center">
        <div class="w-50 my-3">
            @include('partials.carousel')
        </div>
    </div>
    



    <div class="container">
        @foreach ($banner as $imagen)

        <div class="card m-1 mb-3">
            <div class="card-body row">
                <div class="col-md-3">
                    <img src="{{$imagen->url}}" class="card-img-top" alt="{{ $imagen->descripcion }}">
                    <p><small class="">Id: {{$imagen->id}}</small></p>
                </div>
            
                <div class="col-md-9">
                    <form class="" action="{{route('banner.update', $imagen)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="descripcion">Descripción</label>
                                    <textarea required class="form-control" id="descripcion" name="descripcion" rows="3">{{ $imagen->descripcion }}</textarea>
                                    @error('descripcion')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked( $imagen->imagen_con_info )>
                                        <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del evento?</label>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="relevancia">Relevancia <small>(determina el orden en el que aparecen las imagenes)</small></label>
                                    <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{ $imagen->relevancia }}" min="1">
                                    @error('relevancia')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked( $imagen->activo )>
                                    <label class="form-check-label" for="activo">Publicar</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-secondary btn-block btn-sm">Actualizar imagen</button>

                    </form>


                    <form action="{{ route('banner.destroy', $imagen) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger mt-3 float-right btn-sm">Eliminar imagen</button>
                    </form>


                </div>
            </div>
        </div>    

        @endforeach
        
    </div>


    <!-- FORMULARIO PARA AGREGAR IMAGENER AL BANNER CAROUSEL -->
    <!-- FORMULARIO PARA AGREGAR IMAGENER AL BANNER CAROUSEL -->
    <!-- FORMULARIO PARA AGREGAR IMAGENER AL BANNER CAROUSEL -->
    <div class="container mt-5">
        <h3 id="" class="text-center pt-2">Agregar imagen</h3>
        <hr>
        <div class="row mb-5">
            <div class="col-md-12">
                
                <form class="p-3" action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
    
                    <div class="row">
                        <div class="col col-md-6">
       
                            <div class="form-group mb-3">
                                <label for="descripcion">Descripción</label>
                                <textarea required class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion')}}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                        </div>
                    
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="relevancia">Relevancia</label>
                                <input type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{old('relevancia')}}" min="1">
                                @error('relevancia')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="imagen">Imagen</label>
                                <input required type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                                @error('imagen')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                                
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked(old('imagen_con_info'))>
                                    <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del evento?</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                                    <label class="form-check-label" for="activo">Publicar</label>
                                </div>

                            </div>
                        </div>
    
                                
                    </div>
            
                    <button type="submit" class="btn btn-outline-secondary btn-block">Subir imagen</button>
                </form>
            </div>
        </div>

   
    </div>

@endsection

