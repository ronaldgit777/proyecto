<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignarproma extends Model
{
    protected $table = "asignarpromas";
   
    public function profesor()
    {
        return $this->belongsTo(profesor::class,'profesor_id');
    }
    public function materia()
    {
        return $this->belongsTo(materia::class,'materia_id');
    }
    public function aula()
    {
        return $this->belongsTo(aula::class,'aula_id');
    }
    public function periodo()
    {
        return $this->belongsTo(periodo::class,'periodo_id');
    }
}
