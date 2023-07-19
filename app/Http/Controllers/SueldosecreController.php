<?php

namespace App\Http\Controllers;

use App\Models\secretaria;
use App\Models\sueldosecre;
use Illuminate\Http\Request;

class SueldosecreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sueldosecres=sueldosecre::all();
        $secretarias=secretaria::all();
       // return profesor::with('sueldopro')->get(); 
        //$datos['sueldopros']=sueldopro::paginate(7);
        return view('sueldosecre.index',compact('sueldosecres','secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sueldosecre.create',['secretarias'=>secretaria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datossueldosecre=request()->except('_token');
       
        sueldosecre::insert($datossueldosecre);
        //return response()->json($datosprofesor);
        return redirect('sueldosecre');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sueldosecre  $sueldosecre
     * @return \Illuminate\Http\Response
     */
    public function show(sueldosecre $sueldosecre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sueldosecre  $sueldosecre
     * @return \Illuminate\Http\Response
     */
    public function edit(sueldosecre $sueldosecre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sueldosecre  $sueldosecre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sueldosecre $sueldosecre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sueldosecre  $sueldosecre
     * @return \Illuminate\Http\Response
     */
    public function destroy(sueldosecre $sueldosecre)
    {
        //
    }
}
