@extends('layouts.plantilla')

@section('title', 'Editar ' . $tienda->nombre)
@section('meta-description', 'metadescripcion para la pagina de edición de producto')


@section('content')


<div class="my-2">
    <h1 id="in" class="text-center pt-2">EDITAR PRODUCTO</h1>
</div>


<div class="container">

    <div class="row mb-5 mt-5">
        <div class="col-md-12 p-3">

            <form class="" action="{{route('tienda.update', $tienda)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col col-md-6">
                        
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="..." value="{{old('nombre', $tienda->nombre)}}">
                            @error('nombre')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{--<div class="form-group mb-3">
                            <label for="proveedor">Proveedor (opcional)</label>
                            <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="..." value="{{old('proveedor', $tienda->proveedor)}}">
                            @error('proveedor')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>--}}

                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion', $tienda->descripcion)}}</textarea>
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
                            <input type="number" class="form-control" id="precio" name="precio" placeholder="..." value="{{old('precio', $tienda->precio)}}" min="0">
                        </div>

                        <!--input para el costo de inscripcion-->
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="..." value="{{old('stock', $tienda->stock)}}" min="0">
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked(old('activo', $tienda->activo))>
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
        
                <button type="submit" class="btn btn-outline-secondary btn-block">Actualizar</button>
            </form>


            
            <form action="{{ route('tienda.destroy', $tienda) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger mt-2">Eliminar</button>
            </form>
            

        </div>
    </div>


</div>


@endsection

