<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
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


    //relacion uno a muchos inversa con la tabla users
    public function user()
    {
        return $this->belongsTo(User::class);
        //return $this->belongsTo('App\Models\User');
    }


    //obtiene el nombre del usuario que creo el post
    public function autor()
    {
        if($this->user_id){
            return User::find($this->user_id)->name;
        }else{
            return 'El Rafa';
        }
        //return 'holis';
        //return $this->user()->name;

    }

    //relacion uno a muchos polimorfica con la tabla multimedias
    // no es necesaria el siguiente metodo, poruqe los post guardan las imagenes en el campo html
    /*public function multimedias()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Multimedia::class, 'multimediaable');
    }*/


    // relacion muchos a muchos con la tabla categorias
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }


}
