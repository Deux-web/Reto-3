<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        return view('view_estadisticas');
    }

    public function estadisticasTecnicos()
    {
        $inc_por_tecnico = DB::table('incidencias')->join('tecnicos', 'incidencias.tecnico_id', '=', 'tecnicos.id')
            ->select(DB::raw('count(*) as incidencias'), 'tecnicos.nombre')->groupBy('tecnicos.nombre')->where('incidencias.estado', '=', 'RESUELTA')->orderBy('incidencias', 'desc')->get()->take(10);

        return response()->json($inc_por_tecnico);
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

}

