<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscripcion;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'nombre',
        'descripcion',
        'user_id',
        'proveedor',
        'precio',
        'stock',
    ];

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


    //obtiene el nombre del usuario que es proveedor del producto
    public function proveedor()
    {
        $proveedor = User::find($this->user_id)->name;
        if($proveedor == null){
            $proveedor = 'modelo null';
        }
        return $proveedor;
        //return $this->user->name;

    }


    //relacion uno a muchos polimorfica con la tabla multimedias
    public function multimedias()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Multimedia::class, 'multimediaable');
    }


    // relacion muchos a muchos con la tabla categorias
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }


    // muestra las inscripciones que se relacionancon el producto
    // este metodo esta comentado porque hace exactamente lo mismo que el metodo inscripciones()
    /*public function historial()
    {
        return Inscripcion::where('inscripcionable_type', 'App\Models\Producto')->where('inscripcionable_id', $this->id)->orderBy('created_at','desc')->get();
    }*/

    
    //relacion uno a muchos polimorfica con la tabla multimedias
    public function inscripciones()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Inscripcion::class, 'inscripcionable');
    }

}
