<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    protected $table = "inscripcions";
   
    public function asignarproma()
    {
        return $this->belongsTo(asignarproma::class,'asignarproma_id');
    }

    public function alumno()
    {
        return $this->belongsTo(alumno::class,'alumno_id');
    }




    public static function obtenerfecchainicioinscripcion($fechaini,$fechafin,$buscarin2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        $consulta = self::
              when($fechaini, function ($query, $fechaini) {
                  return $query->where('inscripcions.fechadeinscripcion', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('inscripcions.fechadeinscripcion', '<=', $fechafin);
              })   
              ->join('asignarpromas', 'inscripcions.asignarproma_id', '=', 'asignarpromas.id')
              ->join('profesors', 'asignarpromas.profesor_id', '=', 'profesors.id')
              ->join('alumnos', 'inscripcions.alumno_id', '=', 'alumnos.id')
              ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
              ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
              ->join('aulas', 'asignarpromas.aula_id', '=', 'aulas.id')
                ->when($buscarin2, function ($query, $buscarin2) {
                return $query->where(function ($query) use ($buscarin2) {
                 // $query->where('asignarpromas.asignarproma_id', 'like', "%$buscarin2%");
                    $query->where('alumnos.nombre', 'like', "%$buscarin2%")
                        ->orWhere('profesors.nombre', 'like', "%$buscarin2%")
                        ->orWhere('materias.materia', 'like', "%$buscarin2%")
                        ->orWhere('materias.costo', 'like', "%$buscarin2%")
                        ->orWhere('periodos.periodo', 'like', "%$buscarin2%")
                        ->orWhere('aulas.aula', 'like', "%$buscarin2%");
                });
            })   
            ->select(
                'inscripcions.*','fechadeinscripcion',
                'profesors.nombre as profesor_nombre',
                'alumnos.nombre as alumno_nombre',
                'materias.materia as materia_nombre',
                'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            );
              return $consulta->get();       
        //return $fechaini;
    }
    public static function obtenerdatosde3tabla()
    {
        return static
        ::
        //where('inscripcions.estado', 'activo')
        //->
        join('asignarpromas', 'inscripcions.asignarproma_id', '=', 'asignarpromas.id')
            ->join('profesors', 'asignarpromas.profesor_id', '=', 'profesors.id')
            ->join('alumnos', 'inscripcions.alumno_id', '=', 'alumnos.id')
            ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
            ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
            ->join('aulas', 'asignarpromas.aula_id', '=', 'aulas.id')
            ->select(
                'inscripcions.*','fechadeinscripcion',
                'profesors.nombre as profesor_nombre',
                'alumnos.nombre as alumno_nombre',
                'alumnos.apellidopaterno as alumno_apellidopaterno',
                'alumnos.apellidomaterno as alumno_apellidomaterno',
                'materias.materia as materia_nombre',
                'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            )
            ->get();
    }
    public static function obtenerfecchainicioinscripcionreporte($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,$alumnoid2,$ordenarins2,$mayorymenorins2,$alumnoidpa2,$alumnoidma2)
    {      
        // Ejemplo de obtención del sueldo del profesor
       // $fechaini = self::where('fechadeingreso','>=', $fechaini)->get();
        $consulta = self::
              when($fechaini, function ($query, $fechaini) {
                  return $query->where('inscripcions.fechadeinscripcion', '>=', $fechaini);
              })
              ->when($fechafin, function ($query, $fechafin) {
                  return $query->where('inscripcions.fechadeinscripcion', '<=', $fechafin);
              })   
              ->join('alumnos', 'inscripcions.alumno_id', '=', 'alumnos.id')
              ->join('asignarpromas', 'inscripcions.asignarproma_id', '=', 'asignarpromas.id')
              ->join('profesors', 'asignarpromas.profesor_id', '=', 'profesors.id')
              ->join('materias', 'asignarpromas.materia_id', '=', 'materias.id')
              ->join('periodos', 'asignarpromas.periodo_id', '=', 'periodos.id')
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
            ->when($alumnoid2, function ($query, $alumnoid2) {
            return $query->where('alumnos.nombre',$alumnoid2);
            }) 
            ->when($alumnoidpa2, function ($query, $alumnoidpa2) {
                return $query->where('alumnos.apellidopaterno',$alumnoidpa2);
                }) 
                ->when($alumnoidma2, function ($query, $alumnoidma2) {
                    return $query->where('alumnos.apellidomaterno',$alumnoidma2);
                    }) 
            ->select(
                'inscripcions.*','fechadeinscripcion',
                'profesors.nombre as profesor_nombre',
               'alumnos.nombre as alumno_nombre', 'alumnos.apellidopaterno as alumno_apellidopaterno', 'alumnos.apellidomaterno as alumno_apellidomaterno',
                'materias.materia as materia_nombre',
                 'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            );
            if (!empty($ordenarins2) && !empty($mayorymenorins2)) {
                $consulta->orderBy($ordenarins2, $mayorymenorins2);
            }
              return $consulta->get();       
        //return $fechaini;
    }
    
    public static function obtenerlistaalumnosinscritos($materiaid2)
    {
        return static
        ::
        join('asignarpromas', 'inscripcions.asignarproma_id', '=', 'asignarpromas.id')



        ->where('asignarpromas.materia_id',$materiaid2 )
        
        ->join('alumnos', 'inscripcions.alumno_id', '=', 'alumnos.id')


            ->select(
                'alumnos.*'
            )
            ->get();
    }
    
    public static function verificarregistroins($fechadeinscripcion, $asignarproma_id, $alumno_id , $estado)
    {
        return self::
        where('inscripcions.fechadeinscripcion',$fechadeinscripcion )
        ->where('inscripcions.asignarproma_id',$asignarproma_id )
        ->where('inscripcions.alumno_id',$alumno_id )
        ->where('inscripcions.estado',$estado )// Cambia 'campo2' por el nombre real del campo
            ->first();



    }
 }
    


