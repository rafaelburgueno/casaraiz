@extends('layouts.plantilla')

@section('title', 'Crear producto')
@section('meta-description', 'metadescripcion para la pagina de creación de producto')


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">CREAR PRODUCTO</h1>
</div>


<div class="container">

    <div class="row mb-5 mt-5">
        <div class="col-md-12">

            <form class="p-3" action="{{route('tienda.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col col-md-6">
                        
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre')}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{--<div class="form-group mb-3">
                            <label for="proveedor">Proveedor (opcional)</label>
                            <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="..." value="{{old('proveedor')}}">
                            @error('proveedor')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea required class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion')}}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                
                    <div class="col-md-6">

                        {{--<div class="form-group mb-3">
                            <label for="categorias">Categorías (opcional)</label>
                            <input type="text" class="form-control" id="categorias" name="categorias" placeholder="..." value="{{old('categorias')}}">
                        </div>--}}

                        <div class="form-group mb-3">
                            <label for="precio">Precio</label>
                            <input required type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio')}}" min="0">
                        </div>

                        <!--input para el stock-->
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock')}}" min="0">
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo'))>
                            <label class="form-check-label" for="activo">Publicar</label>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="{{old('imagen')}}" accept="image/*">
                            @error('imagen')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                            
                    </div>
                </div>
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Confirmar</button>
            </form>
        </div>
    </div>


</div>


@endsection


