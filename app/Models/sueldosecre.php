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
}
