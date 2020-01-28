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

    public function show(Tecnico $tecnico)
    {
        //
    }


    public function edit(Tecnico $tecnico)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Tecnico $tecnico)
    {
        //
    }
}
