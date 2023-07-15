<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\asignarproma;
use App\Models\profesor;
use App\Models\materia;
use App\Models\aula;
use App\Models\periodo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* SELECT * FROM `alumnos`INNER JOIN inscripcions ON alumnos.id = inscripcions.alumno_id 
    INNER JOIN asignarpromas ON inscripcions.asignarproma_id = asignarpromas.id 
    INNER JOIN profesors ON profesors.id = asignarpromas.profesor_id
    where profesors.id =20*/
     public function index2()
     {   
        $userid=auth()->user()->id;
        $alumnos =alumno
        ::join('inscripcions','inscripcions.alumno_id','=','alumnos.id')
         ->join('asignarpromas','inscripcions.asignarproma_id','=','asignarpromas.id')
         ->join('profesors','asignarpromas.profesor_id','=','profesors.id')
         ->join('users','users.id','=','profesors.user_id')
         ->select('alumnos.*')
         ->where('profesors.user_id','=',$userid)
         //  ->asignarpromas()
         ->get();  
        // $alumnos=alumno::all();
         // return profesor::with('sueldopro')->get(); 
          //$datos['sueldopros']=sueldopro::paginate(7);
          return view('alumno.alumpro',compact('alumnos'));
          
     }
    public function index()
    {
        $alumnos=alumno::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('alumno.index',compact('alumnos'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('alumno.create',['alumnos'=>alumno::all()]);
       return view('alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosalumno=request()->except('_token');
        if($request->hasfile('imagen')){
            $datosalumno['imagen']=$request->file('imagen')->store('uploads','public');
        }
        alumno::insert($datosalumno);
        //return response()->json($datosprofesor);
        return redirect('alumno');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumno $alumno)
    {
        //
    }
}
