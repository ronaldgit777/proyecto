<?php

namespace App\Http\Controllers;

use App\Models\inscripcion;
use App\Models\turno;
use App\Models\User;
use App\Models\asignarproma;
use App\Models\alumno;
use App\Models\profesor;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripcions=inscripcion::all();
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
        return view('inscripcion.create',
        ['asignarpromas'=>asignarproma::all(),
        'alumnos'=>alumno::all(),
        'turnos'=>turno::all(),'profesors'=>profesor::all(),'users'=>user::all()
        ]);
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
