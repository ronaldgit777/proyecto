<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adelantopro extends Model
{
    protected $table = "adelantopros";
   
    public function profesor()
    {
        return $this->belongsTo(profesor::class,'profesor_id');
    }
}
