<?php

namespace App\Http\Controllers;

use App\Centro;
use App\Tecnico;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Centro $centro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro = Centro::find($id);
        return view('centro', ['centro' => $centro]);
    }

    public function get($id)
    {
        $centro = Centro::find($id);
        $tecnicos = Tecnico::where('centro_id', '=', $centro->id)->orderBy('estado')->get();
        return response()->json($tecnicos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Centro $centro
     * @return \Illuminate\Http\Response
     */
    public function edit(Centro $centro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Centro $centro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centro $centro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Centro $centro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centro $centro)
    {
        //
    }
}
