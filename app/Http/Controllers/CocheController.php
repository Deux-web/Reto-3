<?php

namespace App\Http\Controllers;

use App\Coche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CocheController extends Controller
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
     * @param \App\Coche $coche
     * @return \Illuminate\Http\Response
     */
    public function show($matricula)
    {
        $coche = Coche::where('matricula',$matricula)->first();
        $conductores = $coche->conductores;
        return response()->json($conductores);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Coche $coche
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Coche $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Coche $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coche)
    {
        //
    }
}
