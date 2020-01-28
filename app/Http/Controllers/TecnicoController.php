<?php

namespace App\Http\Controllers;

use App\Incidencia;
use App\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store($nombre, $apellido_p, $apellido_s, $email, $telefono, $centro_id)
    {
        $tecnico = new Tecnico();
        $tecnico->nombre = $nombre;
        $tecnico->apellido_p = $apellido_p;
        $tecnico->apellido_s = $apellido_s;
        $tecnico->email = $email;
        $tecnico->telefono = $telefono;
        $tecnico->centro_id = $centro_id;

        $tecnico->save();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Tecnico $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnico = Tecnico::find($id);

        return view('tecnico', ['tecnico' => $tecnico]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Tecnico $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Tecnico $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Tecnico $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $tecnico)
    {
        //
    }
}
