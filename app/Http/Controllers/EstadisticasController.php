<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function selectEstadisticas(){
        $consulta = \App\Incidencia::all()->where('estado', '=', 'ACTIVA');
        $total_incidencias = \App\Incidencia::all();
        $resolucion_insitu = \App\Incidencia::all()->where('tipo_resolucion', '=', 'In situ');
        $resolucion_taller = \App\Incidencia::all()->where('tipo_resolucion', '=', 'Taller');
        $tecnicos = \App\Tecnico::all();

        //$inc_por_tecnico = \App\Incidencia::groupBy('tecnico_id')->orderBy('incidencias', 'desc')->get(DB::raw('count(tecnico_id) as incidencias, tecnico_id'));

        $gipuzkoa = 'Gipuzkoa'; $araba = 'Araba'; $bizkaia = 'Bizkaia'; $nafarroa = 'Nafarroa';
        $incidencias_bizkaia = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$bizkaia}%")->get();
        $incidencias_gipuzkoa = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$gipuzkoa}%")->get();
        $incidencias_araba = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$araba}%")->get();
        $incidencias_nafarroa = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$nafarroa}%")->get();


        return view('view_estadisticas', ['consulta' => $consulta,
            'resolucion_insitu' => $resolucion_insitu,'resolucion_taller' => $resolucion_taller,
            'total_incidencias' =>$total_incidencias,'tecnicos'=>$tecnicos,
            'incidencias_gipuzkoa'=>$incidencias_gipuzkoa,'incidencias_araba'=>$incidencias_araba,
            'incidencias_bizkaia'=> $incidencias_bizkaia,'incidencias_nafarroa'=>$incidencias_nafarroa
        ]);

    }
    public function estadisticasTecnicos(){
        $inc_por_tecnico=DB::table('incidencias')->join('tecnicos','incidencias.tecnico_id','=','tecnicos.id')
            ->select(DB::raw('count(*) as incidencias'),'tecnicos.nombre')->groupBy('incidencias.tecnico_id')->where('incidencias.estado','=','RESUELTA')->orderBy('incidencias', 'desc')->get()->take(10);

        return response()->json($inc_por_tecnico);
    }

}

