<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    /**
     * Get the route key for the model.
     * Esto es para que el slug sea el nombre del evento en la url
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }



    // relacion muchos a muchos con la tabla categorias
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }



    //relacion uno a muchos inversa con la tabla users
    /*protected function user()
    {
        return $this->belongsTo(User::class);
        //return $this->belongsTo('App\Models\User');
    }*/

    //obtiene el nombre del usuario que creo el evento
    public function a_cargo_de()
    {
        if($this->user_id){
            return User::find($this->user_id)->name;
        }else{
            return 'El Rafa';
        }
        //return $this->user->name;
    }

    //relacion uno a muchos polimorfica con la tabla multimedias
    public function multimedias()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Multimedia::class, 'multimediaable');
    }


}
