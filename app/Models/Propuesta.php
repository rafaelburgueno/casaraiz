<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nombre_del_emprendimiento',
        'correo',
        'telefono',
        'redes_sociales',
        'descripcion',
    ];


    //relacion uno a muchos polimorfica con la tabla multimedias
    /*public function multimedias()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Multimedia::class, 'multimediaable');
    }*/

    //relacion uno a uno polimorfica con la tabla multimedias
    public function imagen() {
        return $this->morphOne(Multimedia::class, 'multimediaable');
    }


}
