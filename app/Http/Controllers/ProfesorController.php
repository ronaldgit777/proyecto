<?php

namespace App\Http\Controllers;
use App\Custom\MyClass;

use App\Models\profesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfesorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporpro()
    {   
        $profesors=profesor::all();
         return view('profesor.reporpro',compact('profesors'));    
    }
    public function opcionesreporte()
    {   
         return view('profesor.reporopciones');    
    }
    public function index()
    {   
        $profesors=profesor::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('profesor.index',compact('profesors'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('profesor.create');
        return view('profesor.create',['users'=>User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosprofesor=request()->except('_token');
        if($request->hasfile('imagen')){
            $datosprofesor['imagen']=$request->file('imagen')->store('uploads','public');
        }
        profesor::insert($datosprofesor);
        //return response()->json($datosprofesor);
        return redirect('profesor');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor=profesor::findOrFail($id);
        return view('profesor.show',compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor=profesor::findOrFail($id);
        //$sueldopro=sueldopro::get()->where('$id','=','12');
        return view('profesor.edit',compact('profesor'));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosprofesor=request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $profesor=profesor::findOrFail($id);
            storage::delete('public/'.$profesor->imagen);
            $datosprofesor['imagen']=$request->file('imagen')->store('uploads','public');
        }
        profesor::where('id','=',$id)->update($datosprofesor);
        $profesor=profesor::findOrFail($id);
        return view('profesor.edit',compact('profesor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor=profesor::findOrfail($id);
        if(storage::delete('public/'.$profesor->imagen)){
            profesor::destroy($id);
        }
        return redirect('profesor');
    }

}
