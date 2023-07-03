<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
   // static $rules =['fechadeingreso'=>'required',];
   // protected $perpage=20;

  //  protected $fillable = ['fechadeingreso'];
    protected $table = "profesors";
      /*      public function sueldopros()
        {
            return $this->hasMany('app\models\sueldopro','profesor_id','id');
        } */

}
