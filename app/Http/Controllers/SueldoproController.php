<?php

namespace App\Http\Controllers;

use App\Models\adelantopro;
use App\Models\sueldopro;
use App\Models\profesor;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $profesorId = $request->input('profesor_id');
        adelantopro::where('profesor_id', $profesorId)->update(['estadoade' => 'pagado']);
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

    public function mesessaldopro(Request $request)
    {
        $profesorId = $request->input('profesor_id');

        $cantidadRegistros = sueldopro::where('profesor_id', $profesorId)->count();  

        // Obtén el profesor utilizando el profesor_id
        $profesor = profesor::findOrFail($profesorId);
        // Obtén la fecha de ingreso del profesor
        $fechaIngreso = Carbon::parse($profesor->fechadeingreso); 

        // Establecer la configuración local a español
         Carbon::setLocale('es');
        // Obtén la fecha actual
        $fechaActual = Carbon::now();  

        //sumar los meses pagados
        $fechaIngreso->addMonths($cantidadRegistros); 

        // Calcula la diferencia en meses
        $mesesTranscurridos = $fechaIngreso->diffInMonths($fechaActual); 
        // Genera los nombres de los meses para cada mes transcurrido
        $mesesTexto = [];

        for ($i = 0; $i < $mesesTranscurridos; $i++) {

            $fechaMes = $fechaIngreso->copy()->addMonths($i);
           // $mesesTexto[] = $fechaMes->IsoformatLocalized('%B');
            $mesesTexto[] = $fechaMes->isoFormat('MMMM');
        }

            
        return response()->json($mesesTexto);
            
    }
    
}
