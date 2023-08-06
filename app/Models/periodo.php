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
    public static function obtenerlistaperiodos($buscarpe2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        return self::select('periodos.*') 
              ->when($buscarpe2, function ($query, $buscarpe2) {
                  return $query->where(function ($query) use ($buscarpe2) {
                      $query->where('periodo', 'like', "%$buscarpe2%")
                         // ->orWhere('estado', 'like', "%$buscaraula2%")
                          ;
                  });
              })  
                
             // ->select('profesors.*', 'users.email', 'users.role')
            //  ->get();
            ->select('periodos.*')
            ->get();
        //return $fechaini;
    }
}
