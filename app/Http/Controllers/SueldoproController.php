<?php

namespace App\Http\Controllers;

use App\Models\adelantopro;
use App\Models\sueldopro;
use App\Models\profesor;
use Illuminate\Http\Request;

class SueldoproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sueldopros=sueldopro::all();
        $profesors=profesor::all();
       // return profesor::with('sueldopro')->get(); 
        //$datos['sueldopros']=sueldopro::paginate(7);
        return view('sueldopro.index',compact('sueldopros','profesors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $profesors =profesor::all();
       // $sueldopro =sueldopro();
        //$profesors=profesor::pluck('nombre','id');
       // return view('sueldopro.create',compact('profesors'));

        return view('sueldopro.create',['profesors'=>profesor::all()],['adelantopros'=>adelantopro::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datossueldopro=request()->except('_token');
       
        sueldopro::insert($datossueldopro);
        //return response()->json($datosprofesor);
        return redirect('sueldopro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sueldopro  $sueldopro
     * @return \Illuminate\Http\Response
     */
    public function show(sueldopro $sueldopro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sueldopro  $sueldopro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
      /*  $sueldopro=sueldopro::find($id);
        $profesors=profesor::pluck('nombre','id');
        return view('sueldopro.edit',compact('sueldopro','profesors')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sueldopro  $sueldopro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sueldopro $id)
    {
        /* $datossueldopro=request()->except(['_token','_method']);

        sueldopro::where('id','=',$id)->update($datossueldopro);
        $sueldopro=sueldopro::findOrFail($id);
        return view('sueldopro.edit',compact('sueldopro')); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sueldopro  $sueldopro
     * @return \Illuminate\Http\Response
     */
    public function destroy(sueldopro $sueldopro)
    {
        //
    }
    public function obtenerSueldoProfesor(Request $request)
    {
        $profesorId = $request->input('profesor_id');
        $sueldo = profesor::obtenersueldo($profesorId);
            
        return response()->json($sueldo);
            
    }
    public function obtenerlistaproid(Request $request)
    {
        $profesorId = $request->input('profesor_id');
        $listapro = adelantopro::obtenerlistaproid2($profesorId);
            
        return response()->json($listapro);
            
    }

    
}
