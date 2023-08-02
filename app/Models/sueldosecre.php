<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sueldosecre extends Model
{
    protected $table = "sueldosecres";
   
    public function secretaria()
    {
        return $this->belongsTo(secretaria::class,'secretaria_id');
    }
    public static function obtenersueldoprodesdefechainicio($fechaini,$fechafin,$buscarpro2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        return self::join('secretarias', 'sueldosecres.secretaria_id', '=', 'secretarias.id') 
              ->when($fechaini, function ($query, $fechaini) {
                  return $query->where('sueldosecres.fechadesueldo', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('sueldosecres.fechadesueldo', '<=', $fechafin);
              })  
              ->when($buscarpro2, function ($query, $buscarpro2) {
                  return $query->where(function ($query) use ($buscarpro2) {
                      $query->where('mesdepago', 'like', "%$buscarpro2%")
                          ->orWhere('secretarias.sueldo', 'like', "%$buscarpro2%")
                          ->orWhere('totaldescuento', 'like', "%$buscarpro2%")
                          ->orWhere('totalpago', 'like', "%$buscarpro2%")
                          ->orWhere('observacion', 'like', "%$buscarpro2%")
                          ->orWhere('secretarias.nombre', 'like', "%$buscarpro2%");
                  });
              })  
            ->select('sueldosecres.*', 'secretarias.nombre', 'secretarias.sueldo')
            ->get();
    }  
}
