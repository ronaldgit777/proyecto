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

   

    
    
}
   