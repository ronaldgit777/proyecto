<?php

namespace App\Http\Controllers;

use App\Models\aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['aulas']=aula::paginate(7);
        return view('aula.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosaula=request()->except('_token');
        aula::insert($datosaula);
        //return response()->json($datosprofesor);
        return redirect('aula');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function show(aula $aula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function edit(aula $aula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aula $aula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function destroy(aula $aula)
    {
        //
    }
}
