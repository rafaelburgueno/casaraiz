<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'correo',
        'documento_de_identidad',
        'telefono',
        'inscripcionable_id',
        'inscripcionable_type',
        'medio_de_pago',
        'intereses',
        'comentario',
        'recibir_novedades',
    ];


    //esto indica al modelo que se realiza una relacion polimorfica
    public function inscripcionable()
    {
        return $this->morphTo();
    }

    //metodo que devuelve el evento al que se refiere la inscripcion
    public function inscripto_a()
    {
        if($this->inscripcionable_type == 'membresia' && isset($this->inscripcionable_id)){
            if($this->inscripcionable_id == '1'){ return 'Membresia | Semilla';}
            if($this->inscripcionable_id == '2'){ return 'Membresia | Raíz';}
            if($this->inscripcionable_id == '3'){ return 'Membresia | Árbol';}
            else{ return 'no se encontro la membresia';}
        }
        if($this->inscripcionable_type == 'App\Models\Evento' && isset($this->inscripcionable_id)){
            $evento = Evento::find($this->inscripcionable_id);
            
            return Str::ucfirst($evento->tipo) . ' | ' . $evento->nombre;
        }
        if($this->inscripcionable_type == 'App\Models\Producto' && isset($this->inscripcionable_id)){
            $producto = Producto::find($this->inscripcionable_id);
            
            return $producto->nombre;
        }
        else{
            return 'no se encontro la relacion';
        }

    }

}
