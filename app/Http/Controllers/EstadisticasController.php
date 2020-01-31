<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->rol === 'GERENTE' || $user->rol === 'COORDINADOR') {
            return view('view_estadisticas', ['user' => $user]);
        } else {
            return redirect(route('incidencia.index'));
        }
    }

    public function estadisticasTecnicos()
    {
        $inc_por_tecnico = DB::table('incidencias')->join('tecnicos', 'incidencias.tecnico_id', '=', 'tecnicos.id')
            ->select(DB::raw('count(*) as incidencias'), 'tecnicos.nombre')->groupBy('tecnicos.nombre')->where('incidencias.estado', '=', 'RESUELTA')->orderBy('incidencias', 'desc')->get()->take(10);

        return response()->json($inc_por_tecnico);
    }

    public function estadisticasTiempos(){
        $incidenciasTiempos=DB::table('incidencias')
            ->join('tecnicos', 'incidencias.tecnico_id', '=', 'tecnicos.id')
            ->select(DB::raw('ROUND(AVG(incidencias.updated_at-incidencias.created_at),0)/1000/60 as tiempoResolucion'),'tecnicos.nombre')
            ->where('incidencias.created_at','!=',null)
            ->groupBy('incidencias.tecnico_id')->get();

        return response()->json($incidenciasTiempos);
    }

    public function estadisticasTipo_resolucion()
    {
        $tipos_resolucion = DB::table('incidencias')->select(DB::raw('count(*) as numero_incidencias'), 'tipo_resolucion')->groupBy('tipo_resolucion')->get();

        return response()->json($tipos_resolucion);
    }

    public function estadisticasProvincias()
    {
        $gipuzkoa = 'Gipuzkoa';
        $araba = 'Araba';
        $bizkaia = 'Bizkaia';
        $nafarroa = 'Nafarroa';

        $provincias = DB::table('incidencias')->select(DB::raw('count(*) as numero_incidencias'), 'direccion')
            ->where('direccion', 'like', "%{$bizkaia}%")
            ->orWhere('direccion', 'like', "%{$gipuzkoa}%")
            ->orWhere('direccion', 'like', "%{$araba}%")
            ->orWhere('direccion', 'like', "%{$nafarroa}%")
            ->groupBy('direccion')->get();

        foreach ($provincias as $provincia) {
            $lugar = explode(',', $provincia->direccion);
            $zona = $lugar[1];
            $provincia->direccion = $zona;
        }

        return response()->json($provincias);
    }

    public function estadisticasCalendario()
    {
        //select count(*) as numero,fecha_resolucion from incidencias group by fecha_resolucion;


        $calendario = DB::table('incidencias')->select(DB::raw('count(*) as num_inc'), 'fecha_resolucion')
            ->where('fecha_resolucion', '!=', null)
            ->groupBy('fecha_resolucion')->get();


        return response()->json($calendario);
    }
}

