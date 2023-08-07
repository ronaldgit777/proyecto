<?php

namespace App\Http\Controllers;

use App\Models\inscripcion;
use App\Models\turno;
use App\Models\User;
use App\Models\asignarproma;
use App\Models\alumno;
use App\Models\periodo;
use App\Models\aula;
use App\Models\materia;
use App\Models\profesor;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  buscarfechainicioinscripcionesreporte(Request $request)
    {   
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $aulaid2 = $request->input('aulaid');
       $alumnoid2 = $request->input('alumnoid');  $alumnoidpa2 = $request->input('alumnoidpa');  $alumnoidma2 = $request->input('alumnoida');
       $ordenarins2 = $request->input('ordenarins');
       $mayorymenorins2 = $request->input('mayorymenorins');
       $resultadoconsulta = inscripcion::obtenerfecchainicioinscripcionreporte($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,$alumnoid2,$ordenarins2,$mayorymenorins2,$alumnoidpa2,$alumnoidma2);
       return response()->json($resultadoconsulta); 
    }
    public function  buscarfechainicioinscripciones(Request $request)
    {   
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $buscarin2 = $request->input('buscarin');
       $resultadoconsulta = inscripcion::obtenerfecchainicioinscripcion($fechaini,$fechafin,$buscarin2);
       return response()->json($resultadoconsulta); 
    }
    public function index2()
    {
        $inscripcions=inscripcion::obtenerdatosde3tabla();//reusando de del mode inscripcion 
        $profesors = profesor::all();
        $alumnos =alumno::all();
        $materias =materia::all();
        $aulas =aula::all();
        $periodos =periodo::all();
        $asignarpromas =asignarproma::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('inscripcion.reporprofealumno',compact('inscripcions','profesors','materias','aulas','periodos','alumnos','asignarpromas'));
    }
    public function index()
    {
        $inscripcions=inscripcion::obtenerdatosde3tabla();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('inscripcion.index',compact('inscripcions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
       // $asignarpromas = asignarproma::where('estado', 'activo')->distinct('profesor_id')->get();
       $asignarpromas = asignarproma::where('estado', 'activo')
        ->select('profesor_id')
        ->distinct()
        ->get();
        $alumnos =alumno::all();
        //$profesors =profesor::has('asignarproma');
        $profesors =profesor::all();
        $users =user::all();
        $materias =materia::all();
        $aulas =aula::all();
        $periodos =periodo::all();  
        return view('inscripcion.create', compact('asignarpromas','alumnos','profesors', 'users', 'materias', 'aulas', 'periodos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosinscripcion=request()->except('_token');
        inscripcion::insert($datosinscripcion);
        //return response()->json($datosprofesor);
        return redirect('inscripcion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inscripcion $inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(inscripcion $inscripcion)
    {
        //
    }
}
