<?php

namespace App\Http\Controllers;


use App\Centro;
use App\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidenciaController extends Controller
{
    public function search(Request $request)
    {
        $incidencias = Incidencia::orderBy('id', 'DESC')->paginate(50);
        foreach ($incidencias as $incidencia) {
            $cliente = $incidencia->conductor;
            $incidencia->conductor_id = $cliente;
            $tecnico = $incidencia->tecnico;
            $incidencia->tecnico_id = $tecnico;
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
        $centros=Centro::all();
        return view('view_crear_incidencia',['centros'=>$centros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia= new Incidencia();

        if (request('tipo')=='otros'){
            $incidencia->tipo=request('tipo_otros');
        }
        else{
            $incidencia->tipo = request('tipo');
        }
        $incidencia->titulo= request('titulo');
        $incidencia->descripcion('descripcion');
        if (request('zona')=='interurbana'){
            $zona=request('zona');
            $provincia=request('provincia');
            $tipovia=request('tipovia');
            $carretera=request('carretera');
            $km=request('km');
            $direccion_sentido=request('direccion_sentido');
            $proximidad=request('proximidad');
            $incidencia->direccion=$zona.','.$provincia.','.$tipovia.',';
        }
        return $request;
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
        $conductor = $incidencia->conductor;
        $tecnico = $incidencia->tecnico;
        $centro = $incidencia->centro;
        $comentarios = $incidencia->comentarios;
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
