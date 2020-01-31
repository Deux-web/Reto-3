<?php

use Illuminate\Database\Seeder;

class IncidenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidencias')->insert([
            'tipo' => 'Pinchazo',
            'titulo' => 'Accidente con un Seat Alhambra',
            'descripcion' => 'Pinchazo rueda derecha delantera',
            'direccion' => 'Urbano,Bizkaia,Basauri,Calle Kalea,69',
            'estado' => 'RESUELTA',
            'tipo_resolucion' => 'In situ',
            'mensaje_resolucion' => 'reparado en la calle',
            'taxi' => 0,
            'estado_conductor' => 'Nervioso',
            'operador' => 'jon',
            'fecha_resolucion' => date('Y-m-d h:i:s'),
            'conductor_id' => 2,
            'coche_id' => 23,
            'centro_id' => 2,
            'tecnico_id' => 3,


        ]);
        DB::table('incidencias')->insert([
            'tipo' => 'Pinchazo',
            'titulo' => 'Accidente con un Seat Alhambra',
            'descripcion' => 'Pinchazo rueda derecha delantera',
            'direccion' => 'Urbano,Bizkaia,Basauri,Calle Kalea,69',
            'estado' => 'RESUELTA',
            'tipo_resolucion' => 'Taller',
            'mensaje_resolucion' => 'talleres paco,llevado al taller para reparar',
            'taxi' => 0,
            'estado_conductor' => 'Bien',
            'operador' => 'jon',
            'fecha_resolucion' => date('Y-m-d h:i:s'),
            'conductor_id' => 2,
            'coche_id' => 23,
            'centro_id' => 2,
            'tecnico_id' => 3,
        ]);

    }
}
