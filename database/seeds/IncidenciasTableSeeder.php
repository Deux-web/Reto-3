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
            'tipo' => 'golpe',
            'titulo' => 'Accidente con un Opel Corsa',
            'descripcion' => 'Accidente con un Opel Corsa, radiador roto y el coche no arranca',
            'direccion' => 'Interurbano,Araba,Autopista,AP-68,49,Zaragoza,entre casa y casa jon',
            'taxi' => 0,
            'estado_conductor' => 'bien',
            'operador' => 'jon',
            'conductor_id' => 1,
            'coche_id' => 4,
            'centro_id' => 6,
            'tecnico_id' => 1,
        ]);
        DB::table('incidencias')->insert([
            'tipo' => 'Pinchazo',
            'titulo' => 'Accidente con un Seat Alhambra',
            'descripcion' => 'Pinchazo rueda derecha delantera',
            'direccion' => 'Urbano,Bizkaia,Basauri,Calle Kalea,69',
            'taxi' => 0,
            'estado_conductor' => 'Nervioso',
            'operador' => 'jon',
            'conductor_id' => 2,
            'coche_id' => 23,
            'centro_id' => 2,
            'tecnico_id' => 3,
        ]);
        DB::table('incidencias')->insert([
            'tipo' => 'Fallo del coche',
            'titulo' => 'Seat Ibizia parado en el arcén',
            'descripcion' => 'El motor se ha parado poco a poco y ya no arranca',
            'direccion' => 'Urbano,Gipuzkoa,Arrasate,Calle que vive mi amigo Aner,100',
            'taxi' => 1,
            'estado_conductor' => 'bien',
            'operador' => 'jon',
            'conductor_id' => 5,
            'coche_id' => 12,
            'centro_id' => 3,
            'tecnico_id' => 3,
        ]);
    }
}
