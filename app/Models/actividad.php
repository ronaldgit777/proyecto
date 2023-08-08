<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividad extends Model
{
    protected $table = "actividads";

    public function notas()
    {
        return $this->hasMany(nota::class,'materia_id','id');
    }
    
        public static function obtenerlistaactividades($buscarac2)
        {      
            // Ejemplo de obtención del sueldo del profesor
           // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
            return self::select('actividads.*') 
                  ->when($buscarac2, function ($query, $buscarac2) {
                      return $query->where(function ($query) use ($buscarac2) {
                          $query->where('actividad', 'like', "%$buscarac2%")
                             // ->orWhere('estado', 'like', "%$buscaraula2%")
                              ;
                      });
                  })  
                    
                 // ->select('profesors.*', 'users.email', 'users.role')
                //  ->get();
                ->select('actividads.*')
                ->get();
            //return $fechaini;
        }
}
