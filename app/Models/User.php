<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Inscripcion;


// al implementar MustVerifyEmail, el usuario debe verificar su cuenta antes de poder iniciar sesión
// para iniciar sesion sin verificar el email, se le quita el implements MustVerifyEmail
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'documento_de_identidad',
        'telefono',
        'fecha_de_nacimiento',
        'activo',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * dejo comentado porque el password se esta encriptando desde otro lugar
     *
     * @var array<string, string>
     */
    /*public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }*/


    //devuelve el rol del usuario
    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    //relacion uno a muchos con la tabla posts
    public function posts()
    {
        return $this->hasMany(Post::class);
        //return $this->hasMany('App\Models\Post');
    }


    //relacion uno a muchos con la tabla posts
    public function productos()
    {
        return $this->hasMany(Producto::class);
        //return $this->hasMany('App\Models\Producto');
    }


    //relacion uno a muchos polimorfica con la tabla multimedias
    public function multimedias()
    {
        //return $this->hasMany(Multimedia::class);
        return $this->morphMany(Multimedia::class, 'multimediaable');
    }

    //relacion uno a muchos polimorfica con la tabla multimedias
    public function historial_de_inscripciones()
    {
        //$eventos = Evento::where('frecuencia_semanal', '!=', 1)->orWhereNull('frecuencia_semanal')->where('fecha', '>', now())->where('es_extencion_del_evento_id', NULL)->orderBy('fecha')->paginate(10);
        $inscripciones = Inscripcion::where('user_id', $this->id)->get();
        return $inscripciones;
    }



}
