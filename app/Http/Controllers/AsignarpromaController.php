<?php

namespace App\Http\Controllers;

use App\Models\asignarproma;
use App\Models\profesor;
use App\Models\materia;
use App\Models\aula;
use App\Models\periodo;
use App\Models\alumno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarpromaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  buscarfechainicionotassecreuser(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $aulaid2 = $request->input('aulaid');
       $alumno_nombre2 = $request->input('alumno_nombre');
       $alumno_apepa2 = $request->input('alumno_apepa');
       $alumno_apema2 = $request->input('alumno_apema');
       $promin2 = $request->input('promin');
       $promax2 = $request->input('promax');
       $ordenarasig2 = $request->input('ordenarasig');
       $mayorymenorasig2 = $request->input('mayorymenorasig');
       $userid=auth()->user()->id;
       $resultadoconsulta = asignarproma::obtenerfecchainicionotassecreuser($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,
       $alumno_nombre2,$alumno_apepa2, $alumno_apema2 ,$promin2 ,$promax2,$ordenarasig2, $mayorymenorasig2,$userid);
       return response()->json($resultadoconsulta); 
    }
    public function  buscarfechainicionotasprofeuser(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $aulaid2 = $request->input('aulaid');
       $alumno_nombre2 = $request->input('alumno_nombre');
       $alumno_apepa2 = $request->input('alumno_apepa');
       $alumno_apema2 = $request->input('alumno_apema');
       $promin2 = $request->input('promin');
       $promax2 = $request->input('promax');
       $ordenarasig2 = $request->input('ordenarasig');
       $mayorymenorasig2 = $request->input('mayorymenorasig');
       $userid=auth()->user()->id;
       $resultadoconsulta = asignarproma::obtenerfecchainicionotasprofeuser($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,
       $alumno_nombre2,$alumno_apepa2, $alumno_apema2 ,$promin2 ,$promax2,$ordenarasig2, $mayorymenorasig2,$userid);
       return response()->json($resultadoconsulta); 
    }
    public function  buscarfechainicioalumnoprofeuserreporte(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $aulaid2 = $request->input('aulaid');
       $ordenarasig2 = $request->input('ordenarasig');
       $mayorymenorasig2 = $request->input('mayorymenorasig');
       $userid=auth()->user()->id;
       $resultadoconsulta = asignarproma::obtenerfecchainicioalumnoprofeuserreporte($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,$ordenarasig2, $mayorymenorasig2,$userid);
       return response()->json($resultadoconsulta); 
    }
    public function  buscarfechainicioasigprofeuserreporte(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $aulaid2 = $request->input('aulaid');
       $estadoasig2 = $request->input('estadoasig');
       $userid=auth()->user()->id;
       $resultadoconsulta = asignarproma::obtenerfecchainicioasigprofeuserreporte($fechaini,$fechafin,$materiaid2,$periodoid2,$aulaid2, $estadoasig2,$userid);
       return response()->json($resultadoconsulta); 
    }
    public function  buscarfechainicioasigprofeuser(Request $request)
    {   
        // $rutaImagenBase = asset('storage').'/';
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $estadoasig2 = $request->input('estadoasig');
       $userid=auth()->user()->id;
       $resultadoconsulta = asignarproma::obtenerfecchainicioasigprofeuser($fechaini,$fechafin,$estadoasig2,$userid);
       return response()->json($resultadoconsulta); 
    }
    
    public function  buscarfechainicioasignacionesresecre(Request $request)
    {   
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $aulaid2 = $request->input('aulaid');
       $estadoasig2 = $request->input('estadoasig');
       $ordenarasig2 = $request->input('ordenarasig');
       $mayorymenorasig2 = $request->input('mayorymenorasig');
       $resultadoconsulta = asignarproma::obtenerfecchainicioasignacionesresecre($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,$estadoasig2,$ordenarasig2, $mayorymenorasig2 );
       return response()->json($resultadoconsulta); 
    }
    public function  buscarfechainicioasignacionesre(Request $request)
    {   
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $aulaid2 = $request->input('aulaid');
       $estadoasig2 = $request->input('estadoasig');
       $ordenarasig2 = $request->input('ordenarasig');
       $mayorymenorasig2 = $request->input('mayorymenorasig');
       $resultadoconsulta = asignarproma::obtenerfecchainicioasignacionesre($fechaini,$fechafin,$profesorid2,$materiaid2,$periodoid2,$aulaid2,$estadoasig2,$ordenarasig2, $mayorymenorasig2 );
       return response()->json($resultadoconsulta); 
    }
    public function  buscarfechainicioasignaciones(Request $request)
    {   
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $buscaras2 = $request->input('buscaras');
       $estadopro2 = $request->input('estadopro');
       $resultadoconsulta = asignarproma::obtenerfecchainicioasignaciones($fechaini,$fechafin,$buscaras2,  $estadopro2 );
       return response()->json($resultadoconsulta); 
    }
    public function obteneraulaperiodosmateriaprofesor(Request $request)
    {  
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $periodoid2 = $request->input('periodoid');
       $resultadoconsulta = asignarproma::obteneraulaperimateriaprofesorid($profesorid2,$materiaid2,$periodoid2);
       return response()->json($resultadoconsulta); 
    }
    public function obtenerperiodosmateriaprofesor(Request $request)
    {  
       $profesorid2 = $request->input('profesorid');
       $materiaid2 = $request->input('materiaid');
       $resultadoconsulta = asignarproma::obtenerperimateriaprofesorid($profesorid2,$materiaid2);
       return response()->json($resultadoconsulta); 
    }
    public function obtenermateriasdelprofesorid(Request $request)
    {  
       $profesorid2 = $request->input('profesorid');
       $alumnoid2 = $request->input('alumnoid');
       $resultadoconsulta = asignarproma::obtenermateriaprofesorid($profesorid2, $alumnoid2);
       return response()->json($resultadoconsulta); 
    }
    public function obtenerprofesoresid(Request $request)
    {  
       $alumnoid2 = $request->input('alumnoid');
       $resultadoconsulta = asignarproma::obtenerprofesores($alumnoid2);
       return response()->json($resultadoconsulta); 
    }
    public function reporasigsecre()
    {  
        $profesors = profesor::all();
        $alumnos =alumno::all();
        $materias =materia::all();
        $aulas =aula::all();
        $periodos =periodo::all();
        //$asignarpromas =asignarproma::where('estado','activo')->get();
        $asignarpromas =asignarproma::obtenerdatosde3tabla();
        return view('asignarproma.reporasigsecre',compact('asignarpromas','profesors','materias','aulas','periodos'));
    }
    public function reporasig()
    {  
        $profesors = profesor::all();
        $alumnos =alumno::all();
        $materias =materia::all();
        $aulas =aula::all();
        $periodos =periodo::all();
        //$asignarpromas =asignarproma::where('estado','activo')->get();
        $asignarpromas =asignarproma::obtenerdatosde3tabla();
        return view('asignarproma.reporasig',compact('asignarpromas','profesors','materias','aulas','periodos'));
    }
    public function reporteasigproreporte()
    {
       //s SELECT * FROM `asignarpromas` WHERE asignarpromas.profesor_id = 13
       // $asignarpromas=asignarproma::where('asignarpromas.profesor_id', '=' ,'profesors.id')->get();
       $userid=auth()->user()->id;
       $asignarpromas =asignarproma::obtenerasignarcionproreporte($userid);
        //join('asignarpromas','asignarpromas.profesor_id','=','profesors.id')
        $materias =materia::obtenermateriapro($userid);
        $aulas =aula::obteneraulapro($userid);
        $periodos =periodo::obtenerperiodopro($userid);
        //$asignarpromas=asignarproma::all();
        //return view('auth.registroEmpleado');
        return view('asignarproma.asigproreporte',compact('asignarpromas','materias','aulas','periodos'));
    }
    public function index2()
    {
       //s SELECT * FROM `asignarpromas` WHERE asignarpromas.profesor_id = 13
       // $asignarpromas=asignarproma::where('asignarpromas.profesor_id', '=' ,'profesors.id')->get();
       $userid=auth()->user()->id;
       $asignarpromas =asignarproma::obtenerasignarcionpro($userid);
        //join('asignarpromas','asignarpromas.profesor_id','=','profesors.id')
        $materias =materia::obtenermateriapro($userid);
        $aulas =aula::obteneraulapro($userid);
        $periodos =periodo::obtenerperiodopro($userid);
        //$asignarpromas=asignarproma::all();
        //return view('auth.registroEmpleado');
        return view('asignarproma.asigpro',compact('asignarpromas','materias','aulas','periodos'));
    }
    public function index()
    {   //$asignarpromas=asignarproma::where('estado', 'activo')->get();
       // $asignarpromas=asignarproma::all();
        $asignarpromas=asignarproma::obtenerdatosde3tablaas();
        return view('asignarproma.index',compact('asignarpromas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesors = profesor::all();
        $materias = materia::all();
        //limit 2 registros
        $aulas = aula::all();
        $periodos = periodo::all();
        $users = user::all();
        $asignarpromas = asignarproma::all();
        return view('asignarproma.create', compact('profesors', 'materias', 'aulas', 'periodos', 'users','asignarpromas'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodoId = $request->input('periodo_id');
        $aulaId = $request->input('aula_id');

        if (asignarproma::existeRegistroEnPeriodoYAula($periodoId, $aulaId)) {
            // Ya existe un registro en el mismo periodo y aula
            $mensajeError = 'El aula ya está ocupada.';
            return redirect()->back()->with('registro_duplicado', $mensajeError)->withInput();
        }

        $datosasignarproma = $request->except('_token');
        asignarproma::insert($datosasignarproma);
        return redirect('asignarproma');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignarproma=asignarproma::findOrFail($id);
        $user=user::all();
        $materia=materia::all();
        $profesor=profesor::all();
        $aula=aula::all();
        $periodo=periodo::all();
        return view('asignarproma.show',compact('asignarproma','user','materia','profesor','aula','periodo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignarproma=asignarproma::findOrFail($id);
        $materia=materia::all();
        $profesor=profesor::all();
        $aula=aula::all();
        $periodo=periodo::all();
        //$sueldopro=sueldopro::get()->where('$id','=','12');
        return view('asignarproma.edit',compact('asignarproma','materia','profesor','aula','periodo'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosasig=request()->except(['_token','_method']);
        asignarproma::where('id','=',$id)->update($datosasig);
        $asignarproma=asignarproma::findOrFail($id);
        //return view('asignarproma.edit',compact('asignarproma'));
        return redirect('asignarproma');
        
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignarproma $asignarproma)
    {
        //
    }
    public function obtenerPeriodos(Request $request)
    {
        /*$aulaId = $request->input('aula_id');
        
        $periodosDisponibles = periodo::obtenerPeriodosDisponibles($aulaId);
            
        return response()->json($periodosDisponibles);*/

        $aulaId = $request->input('aula_id');
        $profesorId = $request->input('profesor_id');
        
        $periodosDisponibles = Periodo::obtenerPeriodosDisponibles($aulaId, $profesorId);
            
        return response()->json($periodosDisponibles);
    }
}
