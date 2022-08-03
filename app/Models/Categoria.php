<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;



    // relacion muchos a muchos con la tabla eventos
    public function eventos()
    {
        return $this->belongsToMany(Evento::class);
    }


    // relacion muchos a muchos con la tabla posts
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


    // relacion muchos a muchos con la tabla productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }




}
