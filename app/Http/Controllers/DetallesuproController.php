<?php

namespace App\Http\Controllers;

use App\Models\sueldopro;
use App\Models\detallesupro;
use Illuminate\Http\Request;

class DetallesuproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallesupros=detallesupro::all();
        // return profesor::with('sueldopro')->get(); 
         //$datos['sueldopros']=sueldopro::paginate(7);
         return view('detallesupro.index',compact('detallesupros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detallesupro  $detallesupro
     * @return \Illuminate\Http\Response
     */
    public function show(detallesupro $detallesupro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detallesupro  $detallesupro
     * @return \Illuminate\Http\Response
     */
    public function edit(detallesupro $detallesupro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detallesupro  $detallesupro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detallesupro $detallesupro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detallesupro  $detallesupro
     * @return \Illuminate\Http\Response
     */
    public function destroy(detallesupro $detallesupro)
    {
        //
    }
}
