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
    public static function obtenerlistamaterias($buscarma2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        return self::select('materias.*') 
              ->when($buscarma2, function ($query, $buscarma2) {
                  return $query->where(function ($query) use ($buscarma2) {
                      $query->where('materia', 'like', "%$buscarma2%")
                          ->orWhere('costo', 'like', "%$buscarma2%")
                          ;
                  });
              })  
                
             // ->select('profesors.*', 'users.email', 'users.role')
            //  ->get();
            ->select('materias.*')
            ->get();
        //return $fechaini;
    }
}
