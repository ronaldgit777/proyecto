<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    protected $table = "inscripcion";
    public function User()
    {
        return $this->belongsTo(alumnos::class,'alumno_id');
    }
}
