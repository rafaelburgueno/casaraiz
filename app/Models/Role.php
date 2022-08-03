<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;


    //relacion uno a muchos con la tabla posts
    public function users()
    {
        return $this->hasMany(User::class);
        //return $this->hasMany('App\Models\User');
    }

}
