<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    protected $table = "inscripcions";
   
    public function asignarproma()
    {
        return $this->belongsTo(asignarproma::class,'asignarproma_id');
    }

    public function alumno()
    {
        return $this->belongsTo(alumno::class,'alumno_id');
    }
    
    public function turno()
    {
        return $this->belongsTo(turno::class,'turno_id');
    }

    
}
