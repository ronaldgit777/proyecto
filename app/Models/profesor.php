<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\asignarproma;

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

}


   