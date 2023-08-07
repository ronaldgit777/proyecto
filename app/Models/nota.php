<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    protected $table = "notas";
   
    public function actividad()
    {
        return $this->belongsTo(actividad::class,'actividad_id');
    }

    public function alumno()
    {
        return $this->belongsTo(alumno::class,'alumno_id');
    }
}
