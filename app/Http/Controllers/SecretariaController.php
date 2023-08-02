<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\secretaria;
use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  obtenerfechainiciosecre2(Request $request)
    {   
       $rutaImagenBase = asset('storage').'/';
       $fechaini = $request->input('fechainicio');
       $fechafin = $request->input('fechafinal');
       $buscarsecre2 = $request->input('buscarsecre');
       $resultadoconsulta = secretaria::obtenersecretariasdesdefechainicio2($fechaini,$rutaImagenBase,$fechafin,$buscarsecre2);
           
       return response()->json($resultadoconsulta);        
    }

    public function obtenermenorfechainicio()
    {   
       $buscarmenorfecha = secretaria::obtenermenorfechadesdefechainicio();
       return response()->json($buscarmenorfecha);
    }

     public function  obtenerfechainiciosecre(Request $request)
     {   
        $rutaImagenBase = asset('storage').'/';
        $fechaini = $request->input('fechainicio');
        $fechafin = $request->input('fechafinal');
        $cisecre2 = $request->input('cisecre');
        $nombresecre2 = $request->input('nombresecre');
        $apellidopaternosecre2 = $request->input('apellidopaternosecre');
        $apellidomaternosecre2 = $request->input('apellidomaternosecre');
        $celularsecre2 = $request->input('celularsecre');
        $direccionsecre2 = $request->input('direccionsecre');
        $emailsecre2 = $request->input('emailsecre');
        $estadosecre2 = $request->input('estadosecre');
        $sueldominsecre2 = $request->input('sueldominsecre');
        $sueldomaxsecre2 = $request->input('sueldomaxsecre');
        $ordenarsecre2 = $request->input('ordenarsecre'); $mayorymenorsecre2 = $request->input('mayorymenorsecre');
        $resultadoconsulta = secretaria::obtenersecretariasdesdefechainicio($fechaini,$rutaImagenBase,$fechafin,
        $cisecre2,$nombresecre2,$apellidopaternosecre2,$apellidomaternosecre2,$celularsecre2,$direccionsecre2,$emailsecre2,$estadosecre2,
        $sueldominsecre2,$sueldomaxsecre2, $ordenarsecre2, $mayorymenorsecre2);
            
        return response()->json($resultadoconsulta);        
     }
     public function reporsecres()
     {   
         $secretarias = secretaria::obtenerSecretariasConRutaImagen();
         return view('secretaria.reporsecre', compact('secretarias'));    
     }
     public function opcionesreportesecre()
     {   
          return view('secretaria.reporsecretarias');    
     }
    public function index()
    {
        $secretarias=secretaria::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('secretaria.index',compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.create',['users'=>user::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datossecretaria=request()->except('_token');
        if($request->hasfile('imagen')){
            $datossecretaria['imagen']=$request->file('imagen')->store('uploads','public');
        }
        secretaria::insert($datossecretaria);
        //return response()->json($datosprofesor);
        return redirect('secretaria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function show(secretaria $secretaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function edit(secretaria $secretaria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, secretaria $secretaria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\secretaria  $secretaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(secretaria $secretaria)
    {
        //
    }
}
