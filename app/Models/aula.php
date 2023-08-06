<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aula extends Model
{
    protected $table = "aulas";

    public static function obtenerlistaaulas($buscaraula2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        return self::select('aulas.*') 
              ->when($buscaraula2, function ($query, $buscaraula2) {
                  return $query->where(function ($query) use ($buscaraula2) {
                      $query->where('aula', 'like', "%$buscaraula2%")
                         // ->orWhere('estado', 'like', "%$buscaraula2%")
                          ;
                  });
              })  
                
             // ->select('profesors.*', 'users.email', 'users.role')
            //  ->get();
            ->select('aulas.*')
            ->get();
        //return $fechaini;
    }
}
