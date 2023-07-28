<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\asignarproma;
//use illuminate\faca

class profesor extends Model
{
   // static $rules =['fechadeingreso'=>'required',];
   // protected $perpage=20;

  //  protected $fillable = ['fechadeingreso'];
  protected $fillable = [
    'fechadeingreso',
    'ci',
    'nombre',
    'apellidopaterno',
    'apellidomaterno',
    'celular',
    'direccion',
    'estado',
    'imagen',
    'sueldo',
    'user_id'
];
  protected $table = "profesors";
   
  public function asignarprom()
  {
      return $this->hasMany(asignarproma::class,'profesor_id','id');
  }

  public function User()
  {
      return $this->belongsTo(User::class,'user_id');
  }
 
  public static function obtenerSueldo($profesorId)
  {      
      // Ejemplo de obtención del sueldo del profesor
      $sueldo = self::where('id', $profesorId)->value('sueldo');
      
      return $sueldo;
  }
  public static function obtenerProfesoresConRutaImagen()
    {
        $rutaImagenBase = asset('storage').'/';

        return self::join('users', 'profesors.user_id', '=', 'users.id')
            ->select('profesors.*', 'users.email', 'users.role')
            ->selectRaw("CONCAT('$rutaImagenBase', profesors.imagen) as ruta_imagen")
            ->get();
    }
  public static function obtenerprofesoresdesdefechainicio($fechaini,$rutaImagenBase,$fechafin,$cipro2,$nombrepro2,$sueldominpro2,$sueldomaxpro2)
  {      
      // Ejemplo de obtención del sueldo del profesor
     // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
      return self::join('users', 'profesors.user_id', '=', 'users.id') 
            ->when($fechaini, function ($query, $fechaini) {
                return $query->where('profesors.fechadeingreso', '>=', $fechaini);
            })
            ->when($fechafin, function ($query, $fechafin) {
                return $query->where('profesors.fechadeingreso', '<=', $fechafin);
            })  
            ->where('profesors.ci', 'like', "%$cipro2%") 
            ->where('profesors.nombre', 'like', "%$nombrepro2%") 
            ->when($sueldominpro2, function ($query, $sueldominpro2) {
                return $query->where('profesors.sueldo', '>=', $sueldominpro2);
            })
            ->when($sueldomaxpro2, function ($query, $sueldomaxpro2) {
                return $query->where('profesors.sueldo', '<=', $sueldomaxpro2);
            })      
           // ->select('profesors.*', 'users.email', 'users.role')
          //  ->get();
          ->select('profesors.*', 'users.email', 'users.role')
          ->selectRaw("CONCAT('$rutaImagenBase', profesors.imagen) as ruta_imagen")
          ->get();
      //return $fechaini;
  }
  
  public static function obtenermenorfechadesdefechainicio()
  {      
      // Ejemplo de obtención del sueldo del profesor
      $fechaingreso = self::min('fechadeingreso');
      
      return $fechaingreso;
  }
}


   