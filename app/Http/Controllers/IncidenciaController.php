<?php

namespace App\Http\Controllers;


use App\Centro;
use App\Coche;
use App\Conductor;
use App\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

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
        $user = Auth::user();
        return view('view_incidencias', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centros = Centro::all();
        return view('view_crear_incidencia', ['centros' => $centros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia = new Incidencia();


        if (request('tipo') == 'Otros') {
            $incidencia->tipo = request('tipo_otros');
        } else {
            $incidencia->tipo = request('tipo');
        }
        $incidencia->titulo = request('titulo');
        $incidencia->descripcion = request('descripcion');
        if (request('zona') == 'Interurbana') {
            $zona = request('zona');
            $provincia = request('provincia');
            $tipovia = request('tipovia');
            $carretera = request('carretera');
            $km = request('km');
            $direccion_sentido = request('direccion_sentido');
            $proximidad = request('proximidad');
            $incidencia->direccion = $zona . ',' . $provincia . ',' . $tipovia . ',' . $carretera . ',' . $km . ',' . $direccion_sentido . ',' . $proximidad;
        } else {
            $zona = request('zona');
            $provincia = request('provincia');
            $localidad = request('localidad');
            $calle = request('calle');
            $portal = request('portal');
            $incidencia->direccion = $zona . ',' . $provincia . ',' . $localidad . ',' . $calle . ',' . $portal;
        }
        if (request('taxi') == null) {
            $incidencia->taxi = 0;
        } else {
            $incidencia->taxi = request('taxi');
        }
        $incidencia->estado_conductor = request('estado_conductor');
        $user = Auth::user();
        $incidencia->operador = $user->name;
        $incidencia->conductor_id = request('conductor_id');
        $coche = Coche::where('matricula', '=', request('matricula'))->first();
        $incidencia->coche_id = $coche->id;
        $incidencia->centro_id = request('centro');
        $incidencia->tecnico_id = request('tecnico_id');
        $tecnico = $incidencia->tecnico;
        if ($tecnico !== null) {
            $tecnico->estado = 'Ocupado';
            $tecnico->save();
        }
        $incidencia->save();
        $afectado = Conductor::find($incidencia->conductor_id);

        $this->mandarEmail(
            $tecnico->email,
            'Incidencia ' . $incidencia->id,
            [
                'incidencia' => $incidencia,
                'afectado' => $afectado,
                'coche' => $coche,
                'link_incidencia' => route('incidencia.show', $incidencia->id)
            ]);

        return redirect(route('incidencia.index'));
    }

    public function mandarEmail($address, $subject, $data)
    {
        Mail::to($address)->send(new TestEmail($data, $subject));
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
    public function update(Request $request, $id)
    {
        $incidencia = Incidencia::find($id);
        if ($incidencia->estado == 'ACTIVA') {
            $incidencia->estado = 'PENDIENTE';

            $incidencia->save();

            return redirect(route('incidencia.show', $incidencia->id));
        } else {
            $tipo_resolucion = request('tipo_res');
            $incidencia->tipo_resolucion = $tipo_resolucion;
            if ($tipo_resolucion == 'In situ') {
                $incidencia->mensaje_resolucion = request('textarea_res_insitu');
            } else {
                $taller = request('taller');
                $mensaje = request('textarea_res_taller');
                $mensaje_resolucion = $taller . ',' . $mensaje;
                $incidencia->mensaje_resolucion = $mensaje_resolucion;
            }
            $incidencia->fecha_resolucion = date('Y-m-d h:i:s');
            $incidencia->estado = 'RESUELTA';

            $incidencia->save();

            $tecnico = $incidencia->tecnico;
            $tecnico->estado = 'Disponible';

            $tecnico->save();

            return redirect(route('incidencia.index'));
        }
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
