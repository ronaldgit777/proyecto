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
    
    public static function obteneralumnosdesdefechainicio($fechaini,$rutaImagenBase,$fechafin,$cipro2,$nombrepro2,
    $apellidopaternopro2,$apellidomaternopro2,$celularpro2,$direccionpro2,$emailpro2,$estadopro2,$sueldominpro2,$sueldomaxpro2
    ,$ordenarpro2, $mayorymenorpro2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        $consulta = self::select('alumnos.*')
             -> when($fechaini, function ($query, $fechaini) {
                  return $query->where('alumnos.fechadeingreso', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('alumnos.fechadeingreso', '<=', $fechafin);
              })  
              ->where('alumnos.ci', 'like', "%$cipro2%") 
              ->where('alumnos.nombre', 'like', "%$nombrepro2%")->where('alumnos.apellidopaterno', 'like', "%$apellidopaternopro2%")
              ->where('alumnos.apellidomaterno', 'like', "%$apellidomaternopro2%")  ->where('alumnos.celular', 'like', "%$celularpro2%")  
              ->where('alumnos.direccion', 'like', "%$direccionpro2%")
              //->where('users.email', 'like', "%$emailpro2%")  
              ->where('alumnos.estado', 'like', "%$estadopro2%") 
            //   ->when($sueldominpro2, function ($query, $sueldominpro2) {
            //       return $query->where('profesors.sueldo', '>=', $sueldominpro2);
            //   })
            //   ->when($sueldomaxpro2, function ($query, $sueldomaxpro2) {
            //       return $query->where('profesors.sueldo', '<=', $sueldomaxpro2);
            //   })      
             // ->select('profesors.*', 'users.email', 'users.role')
            //  ->get();
            ->select('alumnos.*')
            ->selectRaw("CONCAT('$rutaImagenBase', alumnos.imagen) as ruta_imagen");
              // Verificar si ambas variables tienen valor
              if (!empty($ordenarpro2) && !empty($mayorymenorpro2)) {
                  $consulta->orderBy($ordenarpro2, $mayorymenorpro2);
              }
              return $consulta->get();       
        //return $fechaini;
    }
   public static function obtenerfecchainicioalumnoslista($fechaini,$rutaImagenBase,$fechafin,$buscaralu2, $estadopro2 )
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
             ->when($estadopro2, function ($query, $estadopro2) {
                return $query->where('alumnos.estado', '=', $estadopro2);
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
