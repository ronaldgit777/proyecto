<?php

namespace App\Http\Controllers;

use App\Models\adelantosecre;
use App\Models\secretaria;
use Illuminate\Http\Request;

class AdelantosecreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adelantosecres=adelantosecre::all();
        $secretarias=secretaria::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('adelantosecre.index',compact('adelantosecres','secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adelantosecre.create',['secretarias'=>secretaria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosadelantosecre=request()->except('_token');
        adelantosecre::insert($datosadelantosecre);
        //return response()->json($datosprofesor);
        return redirect('adelantosecre');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adelantosecre  $adelantosecre
     * @return \Illuminate\Http\Response
     */
    public function show(adelantosecre $adelantosecre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adelantosecre  $adelantosecre
     * @return \Illuminate\Http\Response
     */
    public function edit(adelantosecre $adelantosecre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adelantosecre  $adelantosecre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adelantosecre $adelantosecre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adelantosecre  $adelantosecre
     * @return \Illuminate\Http\Response
     */
    public function destroy(adelantosecre $adelantosecre)
    {
        //
    }
    public function obtenersumatoriaadelantossecretaria(Request $request)
    {
        $secretariaId = $request->input('profesor_id');
        $totaladelanto = adelantosecre::obteneradelantosecre($secretariaId);//obteneradelanto es la funcion del adelantopro el modelo
        return response()->json($totaladelanto);
    }
}
