<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adelantosecre extends Model
{
    protected $table = "adelantosecres";
   
    public function secretaria()
    {
        return $this->belongsTo(secretaria::class,'secretaria_id');
    }
}
