<?php

namespace App\Http\Controllers;

use App\Models\actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividads['actividads']=actividad::paginate(7);
        return view('actividad.index',$actividads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosactividad=request()->except('_token');
        actividad::insert($datosactividad);
        //return response()->json($datosprofesor);
        return redirect('actividad');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actividad $actividad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(actividad $actividad)
    {
        //
    }
}
