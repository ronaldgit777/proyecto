<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sueldopro;
use App\Models\profesor;

class detallesupro extends Model
{
    protected $table = "detallesupros";
   
    public function sueldopro()
    {
        return $this->belongsTo(sueldopro::class,'sueldopro_id');
    }
    public function profesor()
    {
        return $this->belongsTo(profesor::class,'profesor_id');
    }
}
