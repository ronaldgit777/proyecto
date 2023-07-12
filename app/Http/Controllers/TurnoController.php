<?php

namespace App\Http\Controllers;

use App\Models\turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['turnos']=turno::paginate(7);
        return view('turno.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosturno=request()->except('_token');
        turno::insert($datosturno);
        //return response()->json($datosprofesor);
        return redirect('turno');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(turno $turno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, turno $turno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy(turno $turno)
    {
        //
    }
}
