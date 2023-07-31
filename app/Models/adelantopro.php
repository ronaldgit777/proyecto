<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adelantopro extends Model
{
    protected $table = "adelantopros";
    protected $fillable = [
        'profesor_id', 
        'monto',
        'estadoade',
        'observacion',
        'fechaadelantopro'
    ];
   
    public function profesor()
    {
        return $this->belongsTo(profesor::class,'profesor_id');
    }
    public static function obteneradelanto($profesorId)
    {
        $sumatoriaMonto = adelantopro::where('profesor_id', $profesorId)->where('estadoade','pendiente')
        ->sum('monto');
        return $sumatoriaMonto;
    }
    public static function obtenerlistaproid2($profesorId)
    {
        $adelantopro = adelantopro::where('profesor_id', $profesorId)->where('estadoade','pendiente')
                    ->join('profesors', 'adelantopros.profesor_id', '=', 'profesors.id')
                    ->select('adelantopros.*', 'profesors.nombre as nombre_profesor')
                    ->get();

        return $adelantopro;
    }
}
