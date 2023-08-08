<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota extends Model
{  protected $fillable = [
    'fechadenota',
    'actividad_id',
    'materia_id',
    'nota',
    'estado',
];
    protected $table = "notas";
   
    public function actividad()
    {
        return $this->belongsTo(actividad::class,'actividad_id');
    }

    public function alumno()
    {
        return $this->belongsTo(alumno::class,'alumno_id');
    }
    public function materia()
    {
        return $this->belongsTo(materia::class,'materia_id');
    }
}
