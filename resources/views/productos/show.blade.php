@extends('layouts.plantilla')
{{-- la variable que contiene la instancia de producto, se llama $producto 
    porque sino se generan problemasen el controlador --}}
@section('title', $producto->nombre)
@section('meta-description', $producto->descripcion)


@section('content')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">TIENDA</h1>
</div>


<div class="container">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                @if (count($producto->multimedias))
                <img src="{{$producto->multimedias->last()->url}}" class="card-img-top" alt="...">
                @endif

                <div class="card-body">
                    @if($producto->precio)
                    	<p class="h3"><strong> ${{$producto->precio}}</strong></p>
                    @endif
                    
                    <h5 class="card-title text-dark my-1">{{$producto->nombre}}</h5>
                    
                    @if($producto->proveedor)
                    <p class="">De la mano de {{$producto->proveedor}}</p>
                    @endif
                    
                    <p class="h5 my-3">{{$producto->descripcion}}</p>
                    
                    @if (count($producto->categorias))
                    <p>Categorias: {{ $producto->categorias }}</p>
                    @endif

                    <div class="p-0 d-flex justify-content-end">
                        <button class="btn btn-info" style="background-color: rgb(220, 43, 20); color: white;"
							data-toggle="modal" data-target="#lo-quiero-{{$producto->id}}" id="lo-quiero-btn-{{$producto->id}}">
							Lo quiero
						</button>
                    </div>
                    
                    {{-- Esta se mostrara solamente al administrador --}}
                    @if(Auth::check() && Auth::user()->rol == 'administrador')
                        @if(!$producto->activo)
                            <p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-dark">Tenemos {{ $producto->stock }} unidades.</small>
                            <small class="text-dark">Creado el {{$producto->created_at}}</small>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('productos.index')}}" class="btn btn-outline-secondary text-dark">< Volver</a>
                            <a href="{{route('productos.edit', $producto)}}" class="btn btn-outline-secondary text-dark">Editar ></a>
                        </div>
                    @endif
                
                </div>
                        
            </div>


            <!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
			<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
			<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
			<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
			<div class="modal fade" id="lo-quiero-{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="formulario_de_lo_quiero" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="formulario_de_lo_quiero">Completa tus datos</h5>
							{{--<br><small>Lo quiero {{$producto->nombre}}</small>--}}
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('lo_quiero')}}" method="POST">
							<div class="modal-body">
								@csrf
								@method('POST')

								<div class="form-row">
									<!-- input oculto con la informacion $producto->id -->
									<input type="hidden" name="id_producto" value="{{$producto->id}}">

									<div class="form-group col-sm-6">
										<label for="nombre">Nombre: </label>
										<input required type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
										@error('nombre')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

									<div class="form-group col-sm-6">
										<label for="apellido">Apellido: </label>
										<input required type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
										@error('apellido')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="form-group ">
									<label for="correo">Correo: </label>
									<input required type="email" class="form-control" id="correo" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
									@error('correo')
										<div class="alert alert-danger mt-1">{{ $message }}</div>
									@enderror
								</div>
								<div class="form row">
									<div class="form-group col-sm-6">
										<label for="documento">Documento: </label>
										<input required type="text" class="form-control" id="documento" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
									
									</div>
									<div class="form-group col-sm-6">
										<label for="telefono">Celular: </label>
										<input required type="tel" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
										@error('telefono')
										<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>
								</div>
								

								<div class="form-group">
									<label for="comentario">Medio de pago: </label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$producto->id}}" value="efectivo">
										<label class="form-check-label" for="efectivo-{{$producto->id}}">Efectivo</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$producto->id}}" value="midinero">
										<label class="form-check-label" for="midinero-{{$producto->id}}">MiDinero</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$producto->id}}" value="prex">
										<label class="form-check-label" for="prex-{{$producto->id}}">Prex</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$producto->id}}" value="canje/sorteo">
										<label class="form-check-label" for="canje/sorteo-{{$producto->id}}">Canje/Sorteo</label>
									</div>
								</div>

							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-block" style="background-color: coral; color: #e9e2e2;" id="enviar">Enviar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--  ----------FIN DEL FORMULARIO DE LO QUIERO -------- ------ ----- -->


        </div>

        <div class="col-md-2"></div>

        
    </div>      
    

</div>


@endsection