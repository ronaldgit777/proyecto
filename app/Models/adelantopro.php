<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adelantopro extends Model
{
    protected $table = "adelantopros";
    protected $fillable = [
        'profesor_id', 
        'monto',
        'estadoade',
        'observacion',
        'fechaadelantopro'
    ];
   
    public function profesor()
    {
        return $this->belongsTo(profesor::class,'profesor_id');
    }
    public static function obteneradelanto($profesorId)
    {
        $sumatoriaMonto = adelantopro::where('profesor_id', $profesorId)->where('estadoade','pendiente')
        ->sum('monto');
        return $sumatoriaMonto;
    }
    public static function obtenerlistaproid2($profesorId)
    {
        $adelantopro = adelantopro::where('profesor_id', $profesorId)->where('estadoade','pendiente')
                    ->join('profesors', 'adelantopros.profesor_id', '=', 'profesors.id')
                    ->select('adelantopros.*', 'profesors.nombre as nombre_profesor')
                    ->get();

        return $adelantopro;
    }
    public static function obteneradeprodesdefechainicio($fechaini,$fechafin,$buscarpro2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        return self::join('profesors', 'adelantopros.profesor_id', '=', 'profesors.id') 
              ->when($fechaini, function ($query, $fechaini) {
                  return $query->where('adelantopros.fechaadelantopro', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('adelantopros.fechaadelantopro', '<=', $fechafin);
              })  
              ->when($buscarpro2, function ($query, $buscarpro2) {
                  return $query->where(function ($query) use ($buscarpro2) {
                      $query->where('monto', 'like', "%$buscarpro2%")
                          ->orWhere('estadoade', 'like', "%$buscarpro2%")
                          ->orWhere('observacion', 'like', "%$buscarpro2%")
                          ->orWhere('profesors.nombre', 'like', "%$buscarpro2%");
                  });
              })  
                
             // ->select('profesors.*', 'users.email', 'users.role')
            //  ->get();
            ->select('adelantopros.*', 'profesors.nombre as nombre_profesor')
            ->get();
        //return $fechaini;
    }
    public static function obteneradeprodesdefechainiciore($fechaini,$fechafin,$profesorid2,$monto11,$monto22,$ordenaradepro2,$mayorymenoradepro2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
       $consulta = self::join('profesors', 'adelantopros.profesor_id', '=', 'profesors.id')  

             ->when($fechaini, function ($query, $fechaini) {
                  return $query->where('adelantopros.fechaadelantopro', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('adelantopros.fechaadelantopro', '<=', $fechafin);
              })  
              
             // ->where('profesors.id', $profesorid2) 
                ->when($profesorid2, function ($query, $profesorid2) {
                return $query->where('profesors.id',$profesorid2);
                })
              
                ->when($monto11, function ($query, $monto11) {
                    return $query->where('adelantopros.monto', '>=', $monto11);
                })
                ->when($monto22, function ($query, $monto22) {
                    return $query->where('adelantopros.monto', '<=', $monto22);
                })  

            ->select('adelantopros.*','fechaadelantopro', 
            'profesors.nombre as nombre_profesor');
            if (!empty($ordenaradepro2) && !empty($mayorymenoradepro2)) {
                $consulta->orderBy($ordenaradepro2, $mayorymenoradepro2);
            }
            return $consulta->get();  
    }

}
