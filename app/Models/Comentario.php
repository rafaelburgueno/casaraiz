<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'user_id',
        'comentarioable_id',
        'comentarioable_type',
        'nombre',
        'correo',
    ];
}
