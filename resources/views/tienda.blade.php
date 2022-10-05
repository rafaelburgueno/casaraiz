@extends('layouts.plantilla')

@section('title', 'Tienda')
@section('meta-description', 'metadescripción de la pagina Tienda')


@section('content')


<!-- social -->
@include('partials.social')


<div class="text-center my-4">
    <h1 id="in" class="text-center pt-2">TIENDA</h1>
</div>


<div class="container">
    
    <div class="card-columns talleres">
		
		@foreach ($productos as $producto)
		<div class="px-3 pb-5">
			<div class="card m-0">
				@if (count($producto->multimedias))
				{{--<a href="{{route('tienda.show', $producto)}}" class="">--}}
					<img src="{{$producto->multimedias->last()->url}}" class="card-img-top" alt="...">
				{{--</a>--}}
				@endif
				
				<div class="card-body">
				
					{{--<a href="{{route('tienda.show', $producto)}}" class="mt-2">--}}
						<h5 class="card-title text-dark">{{$producto->nombre}}</h5>
					{{--</a>--}}

                    @if(!$producto->activo)
                        <p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
                    @endif
				
					<div class="d-flex justify-content-between align-items-center mb-2">
						<p class="card-text">${{$producto->precio}}</p>
						<small class="text-dark">{{ $producto->stock }} unidades en stock.</small>
					</div>
					
                    @if($producto->proveedor)
					<small class="card-text">De la mano de {{$producto->proveedor}}</small>
                    @endif

					<p class="card-text">{{Str::limit($producto->descripcion, 50)}}</p>
				
					@if (count($producto->categorias))
						<small class="card-text text-dark">Categorias: {{$producto->categorias}}</small>
					@endif

					<div class="d-flex justify-content-between align-items-center">
						{{--<a href="{{route('tienda.show', $producto)}}" class=""><small>más info...</small></a>--}}
                        <div></div>
						<button class="btn btn-tarjetas" {{--style="background-color: rgb(220, 43, 20); color: white;"--}}
							data-toggle="modal" data-target="#lo-quiero-{{$producto->id}}" id="lo-quiero-btn-{{$producto->id}}">
							Lo quiero
						</button>

					</div>
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
						<form action="{{route('lo_quiero')}}" method="POST" onsubmit="return validateForm({{$producto->id}})" class="was-validatedd">
							<div class="modal-body">
								@csrf
								@method('POST')

								<div class="form-row">
									<!-- input oculto con la informacion $producto->id -->
									<input type="hidden" name="id_producto" value="{{$producto->id}}">

									<!-- Input nombre{{$producto->id}} -->
									<div class="form-group col-sm-6">
										<label for="nombre{{$producto->id}}">Nombre: </label>
										<input required type="text" class="form-control" id="nombre{{$producto->id}}" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
										@error('nombre')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

									<!-- Input apellido{{$producto->id}} -->
									<div class="form-group col-sm-6">
										<label for="apellido{{$producto->id}}">Apellido: </label>
										<input required type="text" class="form-control" id="apellido{{$producto->id}}" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
										@error('apellido')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<!-- Input correo{{$producto->id}} -->
								<div class="form-group ">
									<label for="correo{{$producto->id}}">Correo: </label>
									<input required type="email" class="form-control" id="correo{{$producto->id}}" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
									@error('correo')
										<div class="alert alert-danger mt-1">{{ $message }}</div>
									@enderror
								</div>
								<div class="form row">
									<!-- Input documento{{$producto->id}} -->
									<div class="form-group col-sm-6">
										<label for="documento{{$producto->id}}">Documento: </label>
										<input required type="number" min="1111111" max="999999999" class="form-control" id="documento{{$producto->id}}" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
										@error('documento')
										<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>

									<!-- Input telefono{{$producto->id}} -->
									<div class="form-group col-sm-6">
										<label for="telefono{{$producto->id}}">Celular: </label>
										<input required type="number" min="1111111" class="form-control" id="telefono{{$producto->id}}" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
										@error('telefono')
										<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>
								</div>
								
								<!-- Input medio_de_pago{{$producto->id}} -->
								<div class="form-group">
									<label for="comentario">Medio de pago: </label>
									<div class="form-check">
										<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$producto->id}}" value="efectivo">
										<label class="form-check-label" for="efectivo-{{$producto->id}}">Efectivo</label>
									</div>
									<div class="form-check">
										<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$producto->id}}" value="midinero">
										<label class="form-check-label" for="midinero-{{$producto->id}}">MiDinero</label>
									</div>
									<div class="form-check">
										<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$producto->id}}" value="prex">
										<label class="form-check-label" for="prex-{{$producto->id}}">Prex</label>
									</div>
									<div class="form-check">
										<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$producto->id}}" value="canje/sorteo">
										<label class="form-check-label" for="canje/sorteo-{{$producto->id}}">Canje/Sorteo</label>
									</div>
								</div>

								<!--Input recibir_novedades -->
								<div class="form-group pl-3">
									<div class="form check pl-1">
										<input type="checkbox" class="form-check-input" name="recibir_novedades" @checked(old('recibir_novedades')) value="1" id="check" checked>
										<label class="form-check-label" for="check">Quiero recibir las novedades</label>
									</div>
								</div>

							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-block btn-tarjetas" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--  ----------FIN DEL FORMULARIO DE LO QUIERO -------- ------ ----- -->


		</div>
		@endforeach

	</div>

	<!-- Botones de paginacion -->
	{{--{{ $productos->links() }}--}}
	{{--<div class="d-flex justify-content-center">
		{{ $productos->links('pagination::bootstrap-4') }}
	</div>--}}


</div>

<br id="almacen_de_semillas_ruta">
<br><br>

@if(count($almacen_de_semillas))
	<div class="text-center my-4">
		<h1 id="in" class="text-center pt-2">ALMACEN DE SEMILLAS</h1>
	</div>

	<div class="container">
		
		<div class="card-columns talleres">
			
			@foreach ($almacen_de_semillas as $semilla)
			<div class="px-3 pb-5">
				<div class="card m-0">
					@if (count($semilla->multimedias))
					{{--<a href="{{route('tienda.show', $semilla)}}" class="">--}}
						<img src="{{$semilla->multimedias->last()->url}}" class="card-img-top" alt="...">
					{{--</a>--}}
					@endif
					
					<div class="card-body">
					
						{{--<a href="{{route('tienda.show', $semilla)}}" class="mt-2">--}}
							<h5 class="card-title text-dark">{{$semilla->nombre}}</h5>
						{{--</a>--}}

						@if(!$semilla->activo)
							<p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
						@endif
					
						<div class="d-flex justify-content-between align-items-center mb-2">
							@if($semilla->precio)
								<p class="card-text">${{$semilla->precio}}</p>
							@endif
							<small class="text-dark">{{ $semilla->stock }} unidades en stock.</small>
						</div>
						
						@if($semilla->proveedor)
						<small class="card-text">De la mano de {{$semilla->proveedor}}</small>
						@endif

						<p class="card-text">{{Str::limit($semilla->descripcion, 50)}}</p>
					
						@if (count($semilla->categorias))
							<small class="card-text text-dark">Categorias: {{$semilla->categorias}}</small>
						@endif

						<div class="d-flex justify-content-between align-items-center">
							{{--<a href="{{route('tienda.show', $semilla)}}" class=""><small>más info...</small></a>--}}
							<div></div>
							<button class="btn btn-tarjetas" {{--style="background-color: rgb(220, 43, 20); color: white;"--}}
								data-toggle="modal" data-target="#lo-quiero-{{$semilla->id}}" id="lo-quiero-btn-{{$semilla->id}}">
								Lo quiero
							</button>

						</div>
					</div>
				</div>


				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<div class="modal fade" id="lo-quiero-{{$semilla->id}}" tabindex="-1" role="dialog" aria-labelledby="formulario_de_lo_quiero" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="formulario_de_lo_quiero">Completa tus datos</h5>
								{{--<br><small>Lo quiero {{$semilla->nombre}}</small>--}}
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="{{route('lo_quiero')}}" method="POST" onsubmit="return validateForm({{$semilla->id}})" class="was-validatedd">
								<div class="modal-body">
									@csrf
									@method('POST')

									<div class="form-row">
										<!-- input oculto con la informacion $semilla->id -->
										<input type="hidden" name="id_producto" value="{{$semilla->id}}">

										<!-- Input nombre{{$semilla->id}} -->
										<div class="form-group col-sm-6">
											<label for="nombre{{$semilla->id}}">Nombre: </label>
											<input required type="text" class="form-control" id="nombre{{$semilla->id}}" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
											@error('nombre')
												<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>

										<!-- Input apellido{{$semilla->id}} -->
										<div class="form-group col-sm-6">
											<label for="apellido{{$semilla->id}}">Apellido: </label>
											<input required type="text" class="form-control" id="apellido{{$semilla->id}}" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
											@error('apellido')
												<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<!-- Input correo{{$semilla->id}} -->
									<div class="form-group ">
										<label for="correo{{$semilla->id}}">Correo: </label>
										<input required type="email" class="form-control" id="correo{{$semilla->id}}" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
										@error('correo')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>
									<div class="form row">
										<!-- Input documento{{$semilla->id}} -->
										<div class="form-group col-sm-6">
											<label for="documento{{$semilla->id}}">Documento: </label>
											<input required type="number" min="1111111" max="999999999" class="form-control" id="documento{{$semilla->id}}" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
											@error('documento')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>

										<!-- Input telefono{{$semilla->id}} -->
										<div class="form-group col-sm-6">
											<label for="telefono{{$semilla->id}}">Celular: </label>
											<input required type="number" min="1111111" class="form-control" id="telefono{{$semilla->id}}" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
											@error('telefono')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>
									</div>
									
									<!-- Input medio_de_pago{{$semilla->id}} -->
									{{--<div class="form-group">
										<label for="comentario">Medio de pago: </label>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$semilla->id}}" value="efectivo">
											<label class="form-check-label" for="efectivo-{{$semilla->id}}">Efectivo</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$semilla->id}}" value="midinero">
											<label class="form-check-label" for="midinero-{{$semilla->id}}">MiDinero</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$semilla->id}}" value="prex">
											<label class="form-check-label" for="prex-{{$semilla->id}}">Prex</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$semilla->id}}" value="canje/sorteo">
											<label class="form-check-label" for="canje/sorteo-{{$semilla->id}}">Canje/Sorteo</label>
										</div>
									</div>--}}

									<!--Input recibir_novedades -->
									<div class="form-group pl-3">
										<div class="form check pl-1">
											<input type="checkbox" class="form-check-input" name="recibir_novedades" @checked(old('recibir_novedades')) value="1" id="check" checked>
											<label class="form-check-label" for="check">Quiero recibir las novedades</label>
										</div>
									</div>

								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-block btn-tarjetas" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--  ----------FIN DEL FORMULARIO DE LO QUIERO -------- ------ ----- -->


			</div>
			@endforeach

		</div>

		<!-- Botones de paginacion -->
		{{--{{ $almacen_de_semillas->links() }}--}}
		{{--<div class="d-flex justify-content-center">
			{{ $almacen_de_semillas->links('pagination::bootstrap-4') }}
		</div>--}}


	</div>
@endif


<br id="biblioteca_ruta">
<br><br>

@if(count($biblioteca))
	<div class="text-center my-4">
		<h1 id="in" class="text-center pt-2">BIBLIOTECA</h1>
	</div>

	<div class="container">
		
		<div class="card-columns talleres">
			
			@foreach ($biblioteca as $libro)
			<div class="px-3 pb-5">
				<div class="card m-0">
					@if (count($libro->multimedias))
					{{--<a href="{{route('tienda.show', $libro)}}" class="">--}}
						<img src="{{$libro->multimedias->last()->url}}" class="card-img-top" alt="...">
					{{--</a>--}}
					@endif
					
					<div class="card-body">
					
						{{--<a href="{{route('tienda.show', $libro)}}" class="mt-2">--}}
							<h5 class="card-title text-dark">{{$libro->nombre}}</h5>
						{{--</a>--}}

						@if(!$libro->activo)
							<p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
						@endif
					
						<div class="d-flex justify-content-between align-items-center mb-2">
							@if($libro->precio)
								<p class="card-text">${{$libro->precio}}</p>
							@endif
							<small class="text-dark">{{ $libro->stock }} unidades en stock.</small>
						</div>
						
						@if($libro->proveedor)
						<small class="card-text">De la mano de {{$libro->proveedor}}</small>
						@endif

						<p class="card-text">{{Str::limit($libro->descripcion, 50)}}</p>
					
						@if (count($libro->categorias))
							<small class="card-text text-dark">Categorias: {{$libro->categorias}}</small>
						@endif

						<div class="d-flex justify-content-between align-items-center">
							{{--<a href="{{route('tienda.show', $libro)}}" class=""><small>más info...</small></a>--}}
							<div></div>
							<button class="btn btn-tarjetas" {{--style="background-color: rgb(220, 43, 20); color: white;"--}}
								data-toggle="modal" data-target="#lo-quiero-{{$libro->id}}" id="lo-quiero-btn-{{$libro->id}}">
								Lo quiero
							</button>

						</div>
					</div>
				</div>


				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<div class="modal fade" id="lo-quiero-{{$libro->id}}" tabindex="-1" role="dialog" aria-labelledby="formulario_de_lo_quiero" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="formulario_de_lo_quiero">Completa tus datos</h5>
								{{--<br><small>Lo quiero {{$libro->nombre}}</small>--}}
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="{{route('lo_quiero')}}" method="POST" onsubmit="return validateForm({{$libro->id}})" class="was-validatedd">
								<div class="modal-body">
									@csrf
									@method('POST')

									<div class="form-row">
										<!-- input oculto con la informacion $libro->id -->
										<input type="hidden" name="id_producto" value="{{$libro->id}}">

										<!-- Input nombre{{$libro->id}} -->
										<div class="form-group col-sm-6">
											<label for="nombre{{$libro->id}}">Nombre: </label>
											<input required type="text" class="form-control" id="nombre{{$libro->id}}" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
											@error('nombre')
												<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>

										<!-- Input apellido{{$libro->id}} -->
										<div class="form-group col-sm-6">
											<label for="apellido{{$libro->id}}">Apellido: </label>
											<input required type="text" class="form-control" id="apellido{{$libro->id}}" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
											@error('apellido')
												<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<!-- Input correo{{$libro->id}} -->
									<div class="form-group ">
										<label for="correo{{$libro->id}}">Correo: </label>
										<input required type="email" class="form-control" id="correo{{$libro->id}}" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
										@error('correo')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>
									<div class="form row">
										<!-- Input documento{{$libro->id}} -->
										<div class="form-group col-sm-6">
											<label for="documento{{$libro->id}}">Documento: </label>
											<input required type="number" min="1111111" max="999999999" class="form-control" id="documento{{$libro->id}}" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
											@error('documento')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>

										<!-- Input telefono{{$libro->id}} -->
										<div class="form-group col-sm-6">
											<label for="telefono{{$libro->id}}">Celular: </label>
											<input required type="number" min="1111111" class="form-control" id="telefono{{$libro->id}}" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
											@error('telefono')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>
									</div>
									
									<!-- Input medio_de_pago{{$libro->id}} -->
									{{--<div class="form-group">
										<label for="comentario">Medio de pago: </label>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$libro->id}}" value="efectivo">
											<label class="form-check-label" for="efectivo-{{$libro->id}}">Efectivo</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$libro->id}}" value="midinero">
											<label class="form-check-label" for="midinero-{{$libro->id}}">MiDinero</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$libro->id}}" value="prex">
											<label class="form-check-label" for="prex-{{$libro->id}}">Prex</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$libro->id}}" value="canje/sorteo">
											<label class="form-check-label" for="canje/sorteo-{{$libro->id}}">Canje/Sorteo</label>
										</div>
									</div>--}}

									<!--Input recibir_novedades -->
									<div class="form-group pl-3">
										<div class="form check pl-1">
											<input type="checkbox" class="form-check-input" name="recibir_novedades" @checked(old('recibir_novedades')) value="1" id="check" checked>
											<label class="form-check-label" for="check">Quiero recibir las novedades</label>
										</div>
									</div>

								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-block btn-tarjetas" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--  ----------FIN DEL FORMULARIO DE LO QUIERO -------- ------ ----- -->


			</div>
			@endforeach

		</div>

		<!-- Botones de paginacion -->
		{{--{{ $biblioteca->links() }}--}}
		{{--<div class="d-flex justify-content-center">
			{{ $biblioteca->links('pagination::bootstrap-4') }}
		</div>--}}


	</div>
@endif


<br id="ludoteca_ruta">
<br><br>

@if(count($ludoteca))
	<div class="text-center my-4">
		<h1 id="in" class="text-center pt-2">LUDOTECA</h1>
	</div>

	<div class="container">
		
		<div class="card-columns talleres">
			
			@foreach ($ludoteca as $juego)
			<div class="px-3 pb-5">
				<div class="card m-0">
					@if (count($juego->multimedias))
					{{--<a href="{{route('tienda.show', $juego)}}" class="">--}}
						<img src="{{$juego->multimedias->last()->url}}" class="card-img-top" alt="...">
					{{--</a>--}}
					@endif
					
					<div class="card-body">
					
						{{--<a href="{{route('tienda.show', $juego)}}" class="mt-2">--}}
							<h5 class="card-title text-dark">{{$juego->nombre}}</h5>
						{{--</a>--}}

						@if(!$juego->activo)
							<p class="mb-2"><small class="p-1 text-light bg-danger">El producto no es publico</small></p>
						@endif
					
						<div class="d-flex justify-content-between align-items-center mb-2">
							@if($juego->precio)
								<p class="card-text">${{$juego->precio}}</p>
							@endif
							<small class="text-dark">{{ $juego->stock }} unidades en stock.</small>
						</div>
						
						@if($juego->proveedor)
						<small class="card-text">De la mano de {{$juego->proveedor}}</small>
						@endif

						<p class="card-text">{{Str::limit($juego->descripcion, 50)}}</p>
					
						@if (count($juego->categorias))
							<small class="card-text text-dark">Categorias: {{$juego->categorias}}</small>
						@endif

						<div class="d-flex justify-content-between align-items-center">
							{{--<a href="{{route('tienda.show', $juego)}}" class=""><small>más info...</small></a>--}}
							<div></div>
							<button class="btn btn-tarjetas" {{--style="background-color: rgb(220, 43, 20); color: white;"--}}
								data-toggle="modal" data-target="#lo-quiero-{{$juego->id}}" id="lo-quiero-btn-{{$juego->id}}">
								Lo quiero
							</button>

						</div>
					</div>
				</div>


				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<!--  ----------FORMULARIO DE LO QUIERO -------- ------ ----- -->
				<div class="modal fade" id="lo-quiero-{{$juego->id}}" tabindex="-1" role="dialog" aria-labelledby="formulario_de_lo_quiero" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="formulario_de_lo_quiero">Completa tus datos</h5>
								{{--<br><small>Lo quiero {{$juego->nombre}}</small>--}}
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="{{route('lo_quiero')}}" method="POST" onsubmit="return validateForm({{$juego->id}})" class="was-validatedd">
								<div class="modal-body">
									@csrf
									@method('POST')

									<div class="form-row">
										<!-- input oculto con la informacion $juego->id -->
										<input type="hidden" name="id_producto" value="{{$juego->id}}">

										<!-- Input nombre{{$juego->id}} -->
										<div class="form-group col-sm-6">
											<label for="nombre{{$juego->id}}">Nombre: </label>
											<input required type="text" class="form-control" id="nombre{{$juego->id}}" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese su nombre">
											@error('nombre')
												<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>

										<!-- Input apellido{{$juego->id}} -->
										<div class="form-group col-sm-6">
											<label for="apellido{{$juego->id}}">Apellido: </label>
											<input required type="text" class="form-control" id="apellido{{$juego->id}}" name="apellido" value="{{old('apellido')}}" placeholder="Ingrese su Apellido">
											@error('apellido')
												<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<!-- Input correo{{$juego->id}} -->
									<div class="form-group ">
										<label for="correo{{$juego->id}}">Correo: </label>
										<input required type="email" class="form-control" id="correo{{$juego->id}}" name="correo" value="{{old('correo')}}" placeholder="Ingrese su correo">
										@error('correo')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
										@enderror
									</div>
									<div class="form row">
										<!-- Input documento{{$juego->id}} -->
										<div class="form-group col-sm-6">
											<label for="documento{{$juego->id}}">Documento: </label>
											<input required type="number" min="1111111" max="999999999" class="form-control" id="documento{{$juego->id}}" name="documento" value="{{old('documento')}}" placeholder="sin puntos ni guión">
											@error('documento')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>

										<!-- Input telefono{{$juego->id}} -->
										<div class="form-group col-sm-6">
											<label for="telefono{{$juego->id}}">Celular: </label>
											<input required type="number" min="1111111" class="form-control" id="telefono{{$juego->id}}" name="telefono" value="{{old('telefono')}}" placeholder="09xxxxxxxx">
											@error('telefono')
											<div class="alert alert-danger mt-1">{{ $message }}</div>
											@enderror
										</div>
									</div>
									
									<!-- Input medio_de_pago{{$juego->id}} -->
									{{--<div class="form-group">
										<label for="comentario">Medio de pago: </label>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="efectivo-{{$juego->id}}" value="efectivo">
											<label class="form-check-label" for="efectivo-{{$juego->id}}">Efectivo</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="midinero-{{$juego->id}}" value="midinero">
											<label class="form-check-label" for="midinero-{{$juego->id}}">MiDinero</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="prex-{{$juego->id}}" value="prex">
											<label class="form-check-label" for="prex-{{$juego->id}}">Prex</label>
										</div>
										<div class="form-check">
											<input required class="form-check-input" type="radio" name="medio_de_pago" @checked(old('medio_de_pago')) id="canje/sorteo-{{$juego->id}}" value="canje/sorteo">
											<label class="form-check-label" for="canje/sorteo-{{$juego->id}}">Canje/Sorteo</label>
										</div>
									</div>--}}

									<!--Input recibir_novedades -->
									<div class="form-group pl-3">
										<div class="form check pl-1">
											<input type="checkbox" class="form-check-input" name="recibir_novedades" @checked(old('recibir_novedades')) value="1" id="check" checked>
											<label class="form-check-label" for="check">Quiero recibir las novedades</label>
										</div>
									</div>

								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-block btn-tarjetas" {{--style="background-color: coral; color: #e9e2e2;"--}} id="enviar">Enviar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--  ----------FIN DEL FORMULARIO DE LO QUIERO -------- ------ ----- -->


			</div>
			@endforeach

		</div>

		<!-- Botones de paginacion -->
		{{--{{ $ludoteca->links() }}--}}
		{{--<div class="d-flex justify-content-center">
			{{ $ludoteca->links('pagination::bootstrap-4') }}
		</div>--}}


	</div>
@endif

@endsection