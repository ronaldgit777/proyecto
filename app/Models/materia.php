<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\asignarproma;

class materia extends Model
{
    protected $table = "materias";

    public function asignarpromas()
    {
        return $this->hasMany(asignarproma::class,'materia_id','id');
    }
}
