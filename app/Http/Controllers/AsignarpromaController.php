<?php

namespace App\Http\Controllers;

use App\Models\asignarproma;
use App\Models\profesor;
use App\Models\materia;
use App\Models\aula;
use App\Models\periodo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarpromaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index2()
    {
          
       //s SELECT * FROM `asignarpromas` WHERE asignarpromas.profesor_id = 13

       // $asignarpromas=asignarproma::where('asignarpromas.profesor_id', '=' ,'profesors.id')->get();
       $userid=auth()->user()->id;
       $asignarpromas =asignarproma
        //join('asignarpromas','asignarpromas.profesor_id','=','profesors.id')
        ::join('profesors','asignarpromas.profesor_id','=','profesors.id')
        ->join('users','users.id','=','profesors.user_id')
        ->select('asignarpromas.*','profesors.*')
        ->where('profesors.user_id','=',$userid)
        //  ->asignarpromas()
        ->get();    
        //$asignarpromas=asignarproma::all();
        //return view('auth.registroEmpleado');
        return view('asignarproma.asigpro',compact('asignarpromas'));
    }
    public function index()
    {
       // $asignarpromas=asignarproma::where('profesor_id','=','profesor.id')->where('profesor.id','=','user.profesor:id')->get();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
//          return view('asignarproma.index',compact('asignarpromas'));
     /*  $userid=auth()->user()->id;
       //s SELECT * FROM `asignarpromas` WHERE asignarpromas.profesor_id = 13

       // $asignarpromas=asignarproma::where('asignarpromas.profesor_id', '=' ,'profesors.id')->get();
       $asignarpromas =asignarproma
        //join('asignarpromas','asignarpromas.profesor_id','=','profesors.id')
        ::join('profesors','asignarpromas.profesor_id','=','profesors.id')
        ->join('users','users.id','=','profesors.user_id')
        ->select('asignarpromas.*','profesors.*')
        ->where('profesors.user_id','=',$userid)
        //  ->asignarpromas()
        ->get();    */
        // return profesor::with('sueldopro')->get(); 
        //$datos['sueldopros']=sueldopro::paginate(7);
       $asignarpromas=asignarproma::all();
      
        return view('asignarproma.index',compact('asignarpromas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //selecinar tododsl os profesores que tengan menos de 3 registros asignados    
        //'profesors'=>profesor::all(),
      /*   $profesors = profesor::select('*')
        ->havingRaw('COUNT(*) < 1')
        ->groupBy('id')
        ->get();*/
        //return view('asignarproma.create',['profesors'=>profesor::all(),],['materias'=>materia::all()],['aulas'=>aula::all()],['periodos'=>periodo::all()]);      
        //todos los profesores con id mayor a 10
        $profesors = profesor::all();
        $materias = materia::all();
        //limit 2 registros
        $aulas = aula::all();
        $periodos = periodo::all();
        $users = user::all();
        $asignarpromas = asignarproma::all();

        // Pasar los resultados a la vista
        return view('asignarproma.create', compact('profesors', 'materias', 'aulas', 'periodos', 'users','asignarpromas'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periodoId = $request->input('periodo_id');
        $aulaId = $request->input('aula_id');

        if (asignarproma::existeRegistroEnPeriodoYAula($periodoId, $aulaId)) {
            // Ya existe un registro en el mismo periodo y aula
            $mensajeError = 'El aula ya está ocupada.';
            return redirect()->back()->with('registro_duplicado', $mensajeError)->withInput();
        }

        $datosasignarproma = $request->except('_token');
        asignarproma::insert($datosasignarproma);
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
