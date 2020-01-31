<?php

use Illuminate\Database\Seeder;

class CentroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');

        DB::table('centros')->insert([
            'id' => 1,
            'nombre' => 'Agurain',
            'direccion' => '42.8510665,-2.3828899',
            'provincia' => 'Araba',
            'persona_contacto' => $faker->firstName,
            'telefono' => '6' . $faker->randomNumber(8),
            'horario' => '9:00-21:00',
            'email' => $faker->email,
        ]);
        DB::table('centros')->insert([
            'id' => 2,
            'nombre' => 'Basauri',
            'direccion' => '43.2346347,-2.8971273',
            'provincia' => 'Bizkaia',
            'persona_contacto' => $faker->firstName,
            'telefono' => '6' . $faker->randomNumber(8),
            'horario' => '9:00-21:00',
            'email' => $faker->email,
        ]);
        DB::table('centros')->insert([
            'id' => 3,
            'nombre' => 'Durango',
            'direccion' => '43.1693228,-2.6400451',
            'provincia' => 'Bizkaia',
            'persona_contacto' => $faker->firstName,
            'telefono' => '6' . $faker->randomNumber(8),
            'horario' => '9:00-21:00',
            'email' => $faker->email,
        ]);
        DB::table('centros')->insert([
            'id' => 4,
            'nombre' => 'Usurbil',
            'direccion' => '43.270666,-2.0445099',
            'provincia' => 'Gipuzkoa',
            'persona_contacto' => $faker->firstName,
            'telefono' => '6' . $faker->randomNumber(8),
            'horario' => '9:00-21:00',
            'email' => $faker->email,
        ]);
        DB::table('centros')->insert([
            'id' => 5,
            'nombre' => 'Azkoitia',
            'direccion' => '43.1735535,-2.3254154',
            'provincia' => 'Gipuzkoa',
            'persona_contacto' => $faker->firstName,
            'telefono' => '6' . $faker->randomNumber(8),
            'horario' => '9:00-21:00',
            'email' => $faker->email,
        ]);
        DB::table('centros')->insert([
            'id' => 6,
            'nombre' => 'Baranyain',
            'direccion' => '42.807717,-1.6917302',
            'provincia' => 'Nafarroa',
            'persona_contacto' => $faker->firstName,
            'telefono' => '6' . $faker->randomNumber(8),
            'horario' => '9:00-21:00',
            'email' => $faker->email,
        ]);
        DB::table('centros')->insert([
            'id' => 7,
            'nombre' => 'Tafalla',
            'direccion' => '42.5194469,-1.680899',
            'provincia' => 'Nafarroa',
            'persona_contacto' => $faker->firstName,
            'telefono' => '6' . $faker->randomNumber(8),
            'horario' => '9:00-21:00',
            'email' => $faker->email,
        ]);

    }
}
