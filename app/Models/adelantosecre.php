<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adelantosecre extends Model
{
    protected $table = "adelantosecres";
    protected $fillable = [
        'secretaria_id', 
        'monto',
        'estadoade',
        'observacion',
        'fechaadelantosecre'
    ];
   
    public function secretaria()
    {
        return $this->belongsTo(secretaria::class,'secretaria_id');
    }
    public static function obteneradelantosecre($secretariaId)
    {
        $sumatoriaMonto = adelantosecre::where('secretaria_id', $secretariaId)->where('estadoade','pendiente')
        ->sum('monto');
        return $sumatoriaMonto;
    }
    public static function obtenerlistasecreid2($secretariaId)
    {
        $adelantosecre = adelantosecre::where('secretaria_id', $secretariaId)->where('estadoade','pendiente')
                    ->join('secretarias', 'adelantosecres.secretaria_id', '=', 'secretarias.id')
                    ->select('adelantosecres.*', 'secretarias.nombre as nombre_secretaria')
                    ->get();

        return $adelantosecre;
    }
    }
