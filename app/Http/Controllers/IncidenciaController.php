<?php

namespace App\Http\Controllers;

use App\Centro;
use App\Comentario;
use App\Conductor;
use App\Incidencia;
use App\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncidenciaController extends Controller
{
    public function search(Request $request)
    {
        $incidencias = Incidencia::orderBy('id', 'DESC')->paginate(5);
        foreach ($incidencias as $incidencia){
            $cliente=Conductor::find($incidencia->id_conductor);
            $incidencia->id_conductor=$cliente;
            $tecnico=Tecnico::find($incidencia->id_tecnico);
            $incidencia->id_tecnico=$tecnico;
        }
        return response()->json($incidencias);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::all();
        return view('view_incidencias', ['incidencias' => $incidencias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view_crear_incidencia');
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
     * @param \App\Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incidencia = Incidencia::find($id);
        $conductor = Conductor::find($incidencia->id_conductor);
        $tecnico = Tecnico::find($incidencia->id_tecnico);
        $centro = Centro::find($incidencia->id_centro);
        $comentarios = Comentario::all()->where('id_incidencia', $incidencia->id);
        $user = Auth::user();
        return view('view_incidencia', ['incidencia' => $incidencia, 'tecnico' => $tecnico, 'conductor' => $conductor, 'centro' => $centro, 'user' => $user, 'comentarios' => $comentarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Incidencia $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        //
    }
}
