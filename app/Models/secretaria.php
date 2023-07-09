<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class secretaria extends Model
{
   // static $rules =['fechadeingreso'=>'required',];
   // protected $perpage=20;

  //  protected $fillable = ['fechadeingreso'];
  protected $fillable = [
    'fechadeingreso',
    'ci',
    'apellidopaterno',
    'apellidomaterno',
    'celular',
    'direccion',
    'estado',
    'imagen',
    'user_id'
];
  protected $table = "secretarias";
   
  public function User()
  {
      return $this->belongsTo(User::class,'user_id');
  }

}