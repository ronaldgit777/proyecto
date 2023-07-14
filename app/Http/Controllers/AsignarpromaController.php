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
    public function index()
    {
       // $asignarpromas=asignarproma::where('profesor_id','=','profesor.id')->where('profesor.id','=','user.profesor:id')->get();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
//          return view('asignarproma.index',compact('asignarpromas'));
       $userid=auth()->user()->id;
       //s SELECT * FROM `asignarpromas` WHERE asignarpromas.profesor_id = 13

       // $asignarpromas=asignarproma::where('asignarpromas.profesor_id', '=' ,'profesors.id')->get();
        $asignarpromas =asignarproma::
        //::join('asignarpromas','asignarpromas.profesor_id','=','profesors.id')
        join('profesors','asignarpromas.profesor_id','=','profesors.id')
        ->join('users','users.id','=','profesors.user_id')
        ->select('asignarpromas.*','profesors.*')
        ->where('profesors.user_id','=',$userid)
        //  ->asignarpromas()
        ->get();
        // return profesor::with('sueldopro')->get(); 
        //$datos['sueldopros']=sueldopro::paginate(7);
      // $asignarpromas=asignarproma::all();
      
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
        return view('asignarproma.create',
        ['profesors'=>profesor::all(),
        'materias'=>materia::all(),
        'aulas'=>aula::all(),
        'periodos'=>periodo::all(),
        'users'=>user::all()
        ]);
    }

    public function asigpro()
    {
        //return view('asignarproma.create',['profesors'=>profesor::all(),],['materias'=>materia::all()],['aulas'=>aula::all()],['periodos'=>periodo::all()]);
        $asignarpromas=asignarproma::all();
         return view('asignarproma.index',compact('asignarpromas'));    
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
