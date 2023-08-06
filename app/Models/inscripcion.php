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
             // ->select('profesors.*', 'users.email', 'users.role')
            //  ->get();
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
                'materias.materia as materia_nombre',
                'materias.costo as materia_costo',
                'periodos.periodo as periodo_nombre',
                'aulas.aula as aula_nombre'
            )
            ->get();
    }
 }
    


