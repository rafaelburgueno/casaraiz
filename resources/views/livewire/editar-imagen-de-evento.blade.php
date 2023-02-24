<div>
    {{--<img src="{{$imagen->url}}" class="my-2 img-thumbnail" alt="...">--}}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="descripcion">Descripción</label>
                <textarea wire:model="descripcion" class="form-control" id="descripcion" name="descripcion" rows="3">{{ $imagen->descripcion }}</textarea>
            </div>

            <div class="form-check mb-2">
                <input wire:model="imagen_con_info" type="checkbox" class="form-check-input" id="imagen_con_info" name="imagen_con_info" value="1" @checked( $imagen->imagen_con_info )>
                <label class="form-check-label" for="imagen_con_info">¿La imagen contiene información del evento?</label>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="relevancia">Relevancia <small>(determina el orden en el que aparecen las imagenes)</small></label>
                <input wire:model="relevancia" type="number" class="form-control" id="relevancia" name="relevancia" placeholder="..." value="{{ $imagen->relevancia }}" min="1">
            </div>
            
            <div class="form-check mb-2">
                <input wire:model="activo" type="checkbox" class="form-check-input" id="activo" name="activo" value="1" @checked( $imagen->activo )>
                <label class="form-check-label" for="activo">Publicar</label>
            </div>
        </div>

        
    </div>

    <div class="">
        <button type="button" class="btn btn-success btn-block btn-sm float-right mb-2" wire:click="guardar_cambios()">Guardar cambios</button>
        
        <button type="button" class="btn btn-danger btn-sm float-right " wire:click="eliminar()" onclick="borrar({{$imagen->id}});">Eliminar</button>
    </div>

</div>
