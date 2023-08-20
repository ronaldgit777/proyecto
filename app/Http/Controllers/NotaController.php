<?php

namespace App\Http\Controllers;

use App\Models\actividad;
use App\Models\nota;
use App\Models\alumno;
use App\Models\periodo;
use App\Models\aula;
use App\Models\User;
use App\Models\materia;
use App\Models\profesor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  obtenereliminarnotaid(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $notaid2 = $request->input('notaid');
      // $profesorid2 = $request->input('profesorid');
      // $userid=auth()->user()->id;
       $resultadoconsulta = nota::enviarnotaeliminada($notaid2);
       return response()->json($resultadoconsulta); 
    }
    public function  obtenereeditarnota(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $notaid2 = $request->input('notaid');
       $nota2 = $request->input('nota');
      // $profesorid2 = $request->input('profesorid');
      // $userid=auth()->user()->id;
       $resultadoconsulta = nota::enviarnotaeditada($notaid2,$nota2);
       return response()->json($resultadoconsulta); 
    }
    public function  obtenernotasdelalumnoid(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $alumnoid2 = $request->input('alumnoid');
       $materiaid2 = $request->input('materiaid');
      // $profesorid2 = $request->input('profesorid');
      // $userid=auth()->user()->id;
       $resultadoconsulta = nota::obtenernotaalumnoiduser($materiaid2,$alumnoid2);
       return response()->json($resultadoconsulta); 
    }
    public function notasproreporte()
    {   
       $userid=auth()->user()->id;
       $alumnos =alumno
       ::join('inscripcions','inscripcions.alumno_id','=','alumnos.id')
        ->join('asignarpromas','inscripcions.asignarproma_id','=','asignarpromas.id')
        -> join('materias','asignarpromas.materia_id','=','materias.id')
        -> join('aulas','asignarpromas.aula_id','=','aulas.id')
        -> join('periodos','asignarpromas.periodo_id','=','periodos.id')  
        ->join('profesors','asignarpromas.profesor_id','=','profesors.id')
        ->join('users','users.id','=','profesors.user_id')
        ->select('alumnos.*','alumnos.id as alumnoid','materias.id as materiaid','materias.materia','aulas.*','periodos.*','asignarpromas.estado as asignarpromas_estado',
        'profesors.nombre as profesor_nombre','profesors.apellidomaterno as profesor_apellidomaterno','profesors.apellidopaterno as profesor_apellidopaterno',
        DB::raw('ROUND((SELECT AVG(nota) FROM notas 
        WHERE notas.alumno_id = alumnos.id and notas.materia_id = materias.id), 1) 
        as promedio_notas')
        )
        //->where('profesors.user_id','=',$userid)
        ->get();  
        $materias =materia::obtenermateriapro($userid);
        $aulas =aula::obteneraulapro($userid);
       $periodos =periodo::obtenerperiodopro($userid);
       $usuario=user::obtenernombreusuario($userid);
        
       // $alumnos=alumno::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('nota.notasproreporte',compact('alumnos','materias','aulas','periodos','usuario'   ));
         
    }
    public function notasreporte()
    {   
       $userid=auth()->user()->id;
       $alumnos =alumno
       ::join('inscripcions','inscripcions.alumno_id','=','alumnos.id')
        ->join('asignarpromas','inscripcions.asignarproma_id','=','asignarpromas.id')
        -> join('materias','asignarpromas.materia_id','=','materias.id')
        -> join('aulas','asignarpromas.aula_id','=','aulas.id')
        -> join('periodos','asignarpromas.periodo_id','=','periodos.id')  
        ->join('profesors','asignarpromas.profesor_id','=','profesors.id')
        ->join('users','users.id','=','profesors.user_id')
        ->select('alumnos.*','alumnos.id as alumnoid','materias.id as materiaid','materias.materia','aulas.*','periodos.*','asignarpromas.estado as asignarpromas_estado',
        'profesors.nombre as profesor_nombre','profesors.apellidomaterno as profesor_apellidomaterno','profesors.apellidopaterno as profesor_apellidopaterno',
        DB::raw('ROUND((SELECT AVG(nota) FROM notas 
        WHERE notas.alumno_id = alumnos.id and notas.materia_id = materias.id), 1) 
        as promedio_notas')
        )
        //->where('profesors.user_id','=',$userid)
        ->get();  
        $materias =materia::all();
        $aulas =aula::all();
       $periodos =periodo::all();
        $usuario=user::all();
        
       // $alumnos=alumno::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('nota.notasreporte',compact('alumnos','materias','aulas','periodos','usuario'   ));
         
    }
    public function  obtenerfechainicionotareporte(Request $request)
    {   
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $profesorid2 = $request->input('profesorid');
       $alumnoid2 = $request->input('alumnoid');
       $materiaid2 = $request->input('materiaid');
       $estado2 = $request->input('estado');
       $actividadid2 = $request->input('actividadid');
       $notamin2 = $request->input('notamin');
       $notamax = $request->input('notamax');
       $ordenarnot2 = $request->input('ordenarnot');
       $mayorymenornot2 = $request->input('mayorymenornot');
       $resultadoconsulta = nota::obtenernotafechainiciore($fechaini,$fechafin,$profesorid2,$alumnoid2,$materiaid2,$estado2,$actividadid2,$notamin2,$notamax,$ordenarnot2,$mayorymenornot2);   
       return response()->json($resultadoconsulta);        
    }
    public function repornota()
    {   $profesors =profesor::all();
        $notas=nota::obtenerdatosde3tablaas();
        $alumnos=alumno::all();
        $materias =materia::all();
        $actividads =actividad::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('nota.repornota',compact('notas','alumnos','materias','actividads','profesors'));   
    }
    public function  obtenerfechainicionota(Request $request)
    {   
       //$rutaImagenBase = asset('storage').'/';
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $buscarpro2 = $request->input('buscarpro');
       $estadopro2 = $request->input('estadopro');
       $resultadoconsulta = nota::obtenernotadesdefechainicio($fechaini,$fechafin,$buscarpro2,$estadopro2);
           
       return response()->json($resultadoconsulta);        
    }
    public function index()
    {
        $notas=nota::obtenerdatosde3tablaas();
        $alumnos=alumno::all();
        $materias =materia::all();
        $actividads =actividad::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('nota.index',compact('notas','alumnos','materias','actividads'));   
    }

    /**a
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$asignarpromas = asignarproma::where('estado', 'activo');
      //  ->select('profesor_id')
        //->distinct()
        //->get();
        $alumnos =alumno::all();
        //$profesors =profesor::has('asignarproma');
        $profesors =profesor::all();
        $actividads =actividad::all();
        $materias =materia::obtenermateriasasignadas();
        return view('nota.create', compact('alumnos','profesors','materias','actividads'));
    }
    public function notamodalcrear(Request $request)
    {
        nota::insert([
            'fechadenota' => $request->input('fechadenota'),
            'actividad_id' => $request->input('actividad_id'),
            'materia_id' =>$request->input('materia_id'),
            'alumno_id' => $request->input('alumno_id'),
            'nota' => $request->input('nota'),
            'estado' => $request->input('estado'),
        ]);
        return redirect('alumpro');
    }
    public function notamodal(Request $request)
    {
        nota::insert([
            'fechadenota' => $request->input('fechadenota'),
            'actividad_id' => $request->input('actividad_id'),
            'materia_id' =>$request->input('materia_id'),
            'alumno_id' => $request->input('alumno_id'),
            'nota' => $request->input('nota'),
            'estado' => $request->input('estado'),
        ]);
        return redirect('alumpro');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        nota::insert([
            'fechadenota' => $request->input('fechadenota'),
            'actividad_id' => $request->input('actividad_id'),
            'materia_id' =>$request->input('materia_id'),
            'alumno_id' => $request->input('alumno_id'),
            'nota' => $request->input('nota'),
            'estado' => $request->input('estado'),
        ]);
        return redirect('nota');
    } 
    public function store2(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(nota $nota)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(nota $nota)
    {
        //
    }
}
