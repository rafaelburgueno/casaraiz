<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'nombre',
        'tipo',
        'user_id',
        'responsable',
        'descripcion',
        'lugar',
        'activo',
        'frecuencia_semanal',
        'frecuencia_mensual',
        'frecuencia_anual',
        'fecha',
        'hora_de_inicio',
        'hora_de_fin',
        'dia_de_semana',
        'dia',
        'mes',
        'anio',
        'cupos_totales',
        'cupos_disponibles',
        'relevancia',
        'costo_de_inscripcion',
        'es_extencion_del_evento_id',
        'tiene_extenciones',
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

    //obtiene el nombre del usuario que creo el evento
    public function horarios_adicionales()
    {
        if($this->tiene_extenciones){
            $eventos = Evento::where('es_extencion_del_evento_id', $this->id)->get();
            
            if(count($eventos)){
                return $eventos; 
            }else{
                // estas dos lineas previenen que luego de eliminar todos los horarios adicionales 
                // el evento padre quede con el booleano 'tiene_adicionales' en true 
                $this->tiene_extenciones = false;
                $this->save();
                return false;
            }

        }else{
            
            return false;
        }
    }

    //relacion uno a muchos polimorfica con la tabla multimedias
    public function multimedias()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Multimedia::class, 'multimediaable');
    }

    //relacion uno a muchos polimorfica con la tabla multimedias
    public function inscripciones()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Inscripcion::class, 'inscripcionable');
    }


}
