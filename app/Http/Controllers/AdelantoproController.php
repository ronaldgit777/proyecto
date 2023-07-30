<?php

namespace App\Http\Controllers;

use App\Models\adelantopro;
use App\Models\profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdelantoproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function validaradelanto(Request $request)
    {
        $profesorid2 = $request->input('profesorid');
        $monto2 = $request->input('monto');
        $resultado = false;
        $sueldopro =profesor::obtenerSueldo($profesorid2);
        $fechaActual = Carbon::now();
        $diastrabajados = $fechaActual->day;
        $maxadelantomes= ($sueldopro/30)*$diastrabajados;
        if($maxadelantomes >= $monto2){
            $totaladelanto = adelantopro::obteneradelanto($profesorid2);//
            $totaladelanto = $totaladelanto+$monto2;
            if($maxadelantomes >= $totaladelanto){
                $resultado = true;
            }
        }
       // return  $resultado; 
        return response()->json($resultado);
    }

    public function index()
    {
        $adelantopros=adelantopro::all();
        $profesors=profesor::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('adelantopro.index',compact('adelantopros','profesors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adelantopro.create',['profesors'=>profesor::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosadelantopro=request()->except('_token');
        adelantopro::insert($datosadelantopro);
        //return response()->json($datosprofesor);
        return redirect('adelantopro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adelantopro  $adelantopro
     * @return \Illuminate\Http\Response
     */
    public function show(adelantopro $adelantopro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adelantopro  $adelantopro
     * @return \Illuminate\Http\Response
     */
    public function edit(adelantopro $adelantopro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adelantopro  $adelantopro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adelantopro $adelantopro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adelantopro  $adelantopro
     * @return \Illuminate\Http\Response
     */
    public function destroy(adelantopro $adelantopro)
    {
        //
    }
    public function obtenersumatoriaadelantosProfesor(Request $request)
    {
        $profesorId = $request->input('profesor_id');
        $totaladelanto = adelantopro::obteneradelanto($profesorId);//obteneradelanto es la funcion del adelantopro el modelo
        return response()->json($totaladelanto);
    }
}
