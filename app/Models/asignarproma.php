<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignarproma extends Model
{
    protected $fillable = [
        'fechadeasignacion',
        'profesor_id',
        'materia_id',
        'aula_id',
        'periodo_id',
        'estado',
    ];
    protected $table = "asignarpromas";
    
   
    public function profesor()
    {
        return $this->belongsTo(profesor::class,'profesor_id');
    }
    public function materia()
    {
        return $this->belongsTo(materia::class,'materia_id');
    }
    public function aula()
    {
        return $this->belongsTo(aula::class,'aula_id');
    }
    public function periodo()
    {
        return $this->belongsTo(periodo::class,'periodo_id');
    }
    
    public static function existeRegistroEnPeriodoYAula($periodoId, $aulaId)
    {
        return static::where('periodo_id', $periodoId)
            ->where('aula_id', $aulaId)
            ->exists();
    }
    

    public function inscripcion()
    {
        return $this->hasMany(inscripcion::class,'asignarproma_id','id');
    }

    public static function obtenermateriaprofesorid($profesorid2)
    {
        return static::where('profesor_id', $profesorid2)
        ->where('asignarpromas.estado', 'activo')
        ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
        ->select('materias.*')
        ->get();
    }
    public static function obtenerperimateriaprofesorid($profesorid2,$materiaid2)
    {
        return static::where('asignarpromas.profesor_id', $profesorid2)
            ->where('asignarpromas.materia_id', $materiaid2)
            ->where('asignarpromas.estado', 'activo')
            ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
            ->select('periodos.id as periodo_id', 'periodos.periodo as periodo_nombre')
            ->get();
    }
    public static function obteneraulaperimateriaprofesorid($profesorid2,$materiaid2,$periodoid2)
    {
        return static::where('asignarpromas.profesor_id', $profesorid2)
        ->where('asignarpromas.materia_id', $materiaid2)
        ->where('asignarpromas.periodo_id', $periodoid2)
        ->where('asignarpromas.estado', 'activo')
        ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
        ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
        ->join('aulas', 'asignarpromas.aula_id', '=', 'aulas.id')
        ->select('materias.costo as costo_ma', 'aulas.aula as aula_nombre','asignarpromas.id as asig_id')
        ->get();
    }
    public static function obtenerfecchainicioasignaciones($fechaini,$fechafin,$buscaras2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        $consulta = self::
              when($fechaini, function ($query, $fechaini) {
                  return $query->where('asignarpromas.fechadeasignacion', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('asignarpromas.fechadeasignacion', '<=', $fechafin);
              })   
              ->join('profesors', 'asignarpromas.profesor_id', '=', 'profesors.id')
              ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
              ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
              ->join('aulas', 'asignarpromas.aula_id', '=', 'aulas.id')
                ->when($buscaras2, function ($query, $buscarin2) {
                return $query->where(function ($query) use ($buscarin2) {
                 // $query->where('asignarpromas.asignarproma_id', 'like', "%$buscarin2%");
                    $query->where('profesors.nombre', 'like', "%$buscarin2%")
                        ->orWhere('materias.materia', 'like', "%$buscarin2%")
                        ->orWhere('materias.costo', 'like', "%$buscarin2%")
                        ->orWhere('periodos.periodo', 'like', "%$buscarin2%")
                        ->orWhere('aulas.aula', 'like', "%$buscarin2%");
                });
            })   
             // ->select('profesors.*', 'users.email', 'users.role')
            //  ->get();
            ->select(
                'asignarpromas.*','fechadeasignacion',
                'profesors.nombre as profesor_nombre',
                'materias.materia as materia_nombre',
                'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            );
              return $consulta->get();  //return $fechaini;
    }
    public static function obtenerdatosde3tablaas()
    {
        return static::where('asignarpromas.estado', 'activo')
            ->join('profesors', 'asignarpromas.profesor_id', '=', 'profesors.id')
            ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
            ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
            ->join('aulas', 'asignarpromas.aula_id', '=', 'aulas.id')
            ->select(
                'asignarpromas.*','fechadeasignacion',
                'profesors.nombre as profesor_nombre',
                'materias.materia as materia_nombre',
                'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            )
            ->get();
    }
    public static function obtenerfecchainicioasignacionesre($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,$ordenarasig2, $mayorymenorasig2 )
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        $consulta = self::
       
             when($fechaini, function ($query, $fechaini) {
                  return $query->where('asignarpromas.fechadeasignacion', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('asignarpromas.fechadeasignacion', '<=', $fechafin);
              })   
             // ->where('asignarpromas.estado', 'activo')
            ->join('profesors', 'asignarpromas.profesor_id', '=', 'profesors.id')
              ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
              ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
              ->join('aulas', 'asignarpromas.aula_id', '=', 'aulas.id')

            ->when($profesorid2, function ($query, $profesorid2) {
                return $query->where('profesors.id',$profesorid2);
                })
            ->when($materiaid2, function ($query, $materiaid2) {
                return $query->where('materias.id',$materiaid2);
                })
            ->when($periodoid2, function ($query, $periodoid2) {
                return $query->where('periodos.id',$periodoid2);
                })
            ->when($aulaid2, function ($query, $aulaid2) {
                return $query->where('aulas.id',$aulaid2);
                }) 
            ->select(
                'asignarpromas.*','fechadeasignacion',
                'profesors.nombre as profesor_nombre',
                'materias.materia as materia_nombre',
                'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            );
            //aqui tienes q poenr en la vista los opciones del seelc de ordenar m tiene q ser lo q buscas
            if (!empty($ordenarasig2) && !empty($mayorymenorasig2)) {
                $consulta->orderBy($ordenarasig2, $mayorymenorasig2);
            }
              return $consulta->get();  //return $fechaini;
              
             /* ->where('profesors.id', 'like', "%$profesorid2%") 
              ->where('materias.id', 'like', "%$materiaid2%") 
              ->where('periodos.id', 'like', "%$periodoid2%") 
              ->where('aulas.id', 'like', "%$aulaid2%") */
    }
    public static function obtenerdatosde3tabla()
    {
        return static
        ::
        //where('inscripcions.estado', 'activo')
        //->
        join('profesors', 'asignarpromas.profesor_id', '=', 'profesors.id')
            ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
            ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
            ->join('aulas', 'asignarpromas.aula_id', '=', 'aulas.id')
            ->select(
                'asignarpromas.*','fechadeasignacion',
                'profesors.nombre as profesor_nombre',
                'materias.materia as materia_nombre',
                'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            )
            ->get();
    }
}
