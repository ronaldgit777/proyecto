<?php

namespace App\Http\Controllers;

use App\Models\asignarproma;
use App\Models\profesor;
use App\Models\materia;
use App\Models\aula;
use App\Models\periodo;
use Illuminate\Http\Request;

class AsignarpromaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignarpromas=asignarproma::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('asignarproma.index',compact('asignarpromas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('asignarproma.create',['profesors'=>profesor::all(),],['materias'=>materia::all()],['aulas'=>aula::all()],['periodos'=>periodo::all()]);
        return view('asignarproma.create',['profesors'=>profesor::all(),
        'materias'=>materia::all(),'aulas'=>aula::all(),'periodos'=>periodo::all()
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
        $datosasignarproma=request()->except('_token');
       
        asignarproma::insert($datosasignarproma);
        //return response()->json($datosprofesor);
        return redirect('asignarproma');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function show(asignarproma $asignarproma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function edit(asignarproma $asignarproma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asignarproma $asignarproma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asignarproma  $asignarproma
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignarproma $asignarproma)
    {
        //
    }
}
