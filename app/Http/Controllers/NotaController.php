<?php

namespace App\Http\Controllers;

use App\Models\actividad;
use App\Models\nota;
use App\Models\alumno;
use App\Models\periodo;
use App\Models\aula;
use App\Models\materia;
use App\Models\profesor;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas=nota::all(); 
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
        //
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
