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
    public static function obteneradelantosecre($secretariaId)
    {
        $sumatoriaMonto = adelantosecre::where('secretaria_id', $secretariaId)->where('observacion','pendiente')
        ->sum('monto');

        return $sumatoriaMonto;
    }
    public static function obtenerlistaproid2($secretariaId)
    {
        
        $adelantopro = adelantopro::where('profesor_id', $secretariaId)->where('observacion','pendiente')
                    ->join('profesors', 'adelantopros.profesor_id', '=', 'profesors.id')
                    ->select('adelantopros.*', 'profesors.nombre as nombre_profesor')
                    ->get();

        return $adelantopro;
    }
}
