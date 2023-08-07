<?php

namespace App\Http\Controllers;

use App\Models\actividad;
use App\Models\nota;
use App\Models\turno;
use App\Models\User;
use App\Models\asignarproma;
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
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('nota.index',compact('notas'));   
    }

    /**a
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $asignarpromas = asignarproma::where('estado', 'activo');
      //  ->select('profesor_id')
        //->distinct()
        //->get();
        $alumnos =alumno::all();
        //$profesors =profesor::has('asignarproma');
        $profesors =profesor::all();
        $actividads =actividad::all();
        $materias =materia::all();
        $aulas =aula::all();
        $periodos =periodo::all();  
        return view('nota.create', compact('asignarpromas','alumnos','profesors','materias', 'aulas', 'periodos','actividads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
