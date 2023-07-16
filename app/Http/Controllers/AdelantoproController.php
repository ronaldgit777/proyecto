<?php

namespace App\Http\Controllers;

use App\Models\adelantopro;
use App\Models\profesor;
use Illuminate\Http\Request;

class AdelantoproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
}
