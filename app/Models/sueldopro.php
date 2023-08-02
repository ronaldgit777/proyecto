<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\profesor;

class sueldopro extends Model
{
    
   // static $rules =['fechadeingreso'=>'required',];
   // protected $perpage=20;

    protected $table = "sueldopros";
   
    public function profesor()
    {
        return $this->belongsTo(profesor::class,'profesor_id');
    }
    public static function obtenersueldoprodesdefechainicio($fechaini,$fechafin,$buscarpro2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        return self::join('profesors', 'sueldopros.profesor_id', '=', 'profesors.id') 
              ->when($fechaini, function ($query, $fechaini) {
                  return $query->where('sueldopros.fechadesueldo', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('sueldopros.fechadesueldo', '<=', $fechafin);
              })  
              ->when($buscarpro2, function ($query, $buscarpro2) {
                  return $query->where(function ($query) use ($buscarpro2) {
                      $query->where('mesdepago', 'like', "%$buscarpro2%")
                          ->orWhere('profesors.sueldo', 'like', "%$buscarpro2%")
                          ->orWhere('totaldescuento', 'like', "%$buscarpro2%")
                          ->orWhere('totalpago', 'like', "%$buscarpro2%")
                          ->orWhere('observacion', 'like', "%$buscarpro2%")
                          ->orWhere('profesors.nombre', 'like', "%$buscarpro2%");
                  });
              })  
            ->select('sueldopros.*', 'profesors.nombre', 'profesors.sueldo')
            ->get();
    }  
    
}
   