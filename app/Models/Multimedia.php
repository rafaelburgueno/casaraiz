<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $guarded = [];

    use HasFactory;


    //esto indica al modelo que se realiza una relacion polimorfica
    public function multimediaable()
    {
        return $this->morphTo();
    }


}
