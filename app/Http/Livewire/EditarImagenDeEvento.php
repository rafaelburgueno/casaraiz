<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class EditarImagenDeEvento extends Component
{

    public $imagen;
    public $descripcion;
    public $imagen_con_info;
    public $relevancia;
    public $activo;
    
    // este metodo es necesario para traer una variable desde el frontend
    public function mount(Multimedia $imagen)
    {
        $this->imagen = $imagen;
        $this->descripcion = $imagen->descripcion;
        $this->imagen_con_info = $imagen->imagen_con_info;
        $this->relevancia = $imagen->relevancia;
        $this->activo = $imagen->activo;
    }


    //metodo para guardar los cambios
    public function guardar_cambios(){
        $this->imagen->descripcion = $this->descripcion;
        $this->imagen->imagen_con_info = $this->imagen_con_info;
        $this->imagen->relevancia = $this->relevancia;
        $this->imagen->activo = $this->activo;
        $this->imagen->save();
    }


    // metodo para eliminar una imagen
    public function eliminar(){
        //se cambia la url relativa por la url del directorio
        $url = str_replace('storage', 'public', $this->imagen->url);
            
        // elimina de la carpeta
        Storage::delete($url);

        // Se eliminan de la base de datos las imagenes relacionadas al evento
        $this->imagen->delete();
    }





    
    public function render()
    {
        return view('livewire.editar-imagen-de-evento');
    }
}
