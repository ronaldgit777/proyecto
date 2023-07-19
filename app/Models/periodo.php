<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodo extends Model
{
    protected $table = "periodos";
   /* public static function obtenerPeriodosDisponibles($aulaId)
    {
        $periodosAula = Asignarproma::where('aula_id', $aulaId)->pluck('periodo_id');  
        $periodosProfesor = Asignarproma::where('profesor_id', $profesorId)->pluck('periodo_id'); 

        $periodosUsados = $periodosAula->merge($periodosProfesor); 

        $periodosDisponibles = Periodo::whereNotIn('id', $periodosUsados) ->get(); 
        
        return $periodosDisponibles;
    }*/

    public static function obtenerPeriodosDisponibles($aulaId, $profesorId)
    {
        $periodosAula = Asignarproma::where('aula_id', $aulaId)->pluck('periodo_id');  
        $periodosProfesor = Asignarproma::where('profesor_id', $profesorId)->pluck('periodo_id'); 

        $periodosUsados = $periodosAula->merge($periodosProfesor); 

        $periodosDisponibles = Periodo::whereNotIn('id', $periodosUsados) ->get(); 
        
        return $periodosDisponibles;
    }
}
