<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $table = "alumnos";
   

    public function notas()
    {
        return $this->hasMany(nota::class,'alumno_id','id');
    }
    
    
   //public $timestamps=false;
   //protected $primarykey ='id';
   public function promedioNotas()
   {
       return $this->hasMany(nota::class)
           ->selectRaw('AVG(nota) as promedio, alumnos.id')
           ->groupBy('alumnos.id');
   }
  



   public static function obtenerno(){
    return self::
    select('nombre')
    ->distinct()
    ->get();// Retorna una colección de apellidos paternos únicos de todos los alumnos
    }
    public static function obtenerapellidospa(){
        //return self::distinct()->pluck('apellidopaterno'); 
        return self::
        select('alumnos.apellidopaterno')
        ->distinct()
        ->get();
    }
    public static function obtenerapellidosma(){
      //  return self::distinct()->pluck('apellidomaterno');
        return self::
        select('apellidomaterno')
        ->distinct()
        ->get();
    }

   public static function obtenerfecchainicioalumnoslista($fechaini,$rutaImagenBase,$fechafin,$buscaralu2)
   {      
       // Ejemplo de obtención del sueldo del profesor
      // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
       return self::select('alumnos.*')
             ->when($fechaini, function ($query, $fechaini) {
                 return $query->where('alumnos.fechadeingreso', '>=', $fechaini);
             })
             ->when($fechafin, function ($query, $fechafin) {
                 return $query->where('alumnos.fechadeingreso', '<=', $fechafin);
             })  
             ->when($buscaralu2, function ($query, $buscaralu2) {
                 return $query->where(function ($query) use ($buscaralu2) {
                     $query->where('ci', 'like', "%$buscaralu2%")
                         ->orWhere('nombre', 'like', "%$buscaralu2%")
                         ->orWhere('apellidopaterno', 'like', "%$buscaralu2%")
                         ->orWhere('apellidomaterno', 'like', "%$buscaralu2%")
                         ->orWhere('celular', 'like', "%$buscaralu2%")
                         ->orWhere('direccion', 'like', "%$buscaralu2%")
                         ->orWhere('correo', 'like', "%$buscaralu2%")
                         ->orWhere('estado', 'like', "%$buscaralu2%");
                 });
             })  
            // ->select('profesors.*', 'users.email', 'users.role')
           //  ->get();
           ->select('alumnos.*')
           ->selectRaw("CONCAT('$rutaImagenBase', alumnos.imagen) as ruta_imagen")
           ->get();
       //return $fechaini;
   }
   public static function obtenerfecchainicioalumnoslistaprofe($fechaini,$rutaImagenBase,$fechafin,$buscaralu2,$user_id2)
   {      
       // Ejemplo de obtención del sueldo del profesor
      // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
       return self::
            when($fechaini, function ($query, $fechaini) {
                 return $query->where('alumnos.fechadeingreso', '>=', $fechaini);
             })
             ->when($fechafin, function ($query, $fechafin) {
                 return $query->where('alumnos.fechadeingreso', '<=', $fechafin);
             })  
             

             ->when($buscaralu2, function ($query, $buscaralu2) {
                 return $query->where(function ($query) use ($buscaralu2) {
                     $query->where('ci', 'like', "%$buscaralu2%")
                         ->orWhere('nombre', 'like', "%$buscaralu2%")
                         ->orWhere('apellidopaterno', 'like', "%$buscaralu2%")
                         ->orWhere('apellidomaterno', 'like', "%$buscaralu2%")
                         ->orWhere('celular', 'like', "%$buscaralu2%")
                         ->orWhere('direccion', 'like', "%$buscaralu2%")
                         ->orWhere('correo', 'like', "%$buscaralu2%")
                         ->orWhere('estado', 'like', "%$buscaralu2%");
                 });
             })  
            // ->select('profesors.*', 'users.email', 'users.role')
           //  ->get();
           ->select('alumnos.*')
           ->selectRaw("CONCAT('$rutaImagenBase', alumnos.imagen) as ruta_imagen")
           ->get();
       //return $fechaini;
   }
}
