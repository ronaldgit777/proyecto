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
