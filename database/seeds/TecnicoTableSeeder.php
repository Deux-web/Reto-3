<?php

use Illuminate\Database\Seeder;

class TecnicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 0; $i < 21; $i++) {
            DB::table('tecnicos')->insert([

                'nombre' => $faker->firstName,
                'apellido_p' => $faker->lastName,
                'apellido_s' => $faker->lastName,
                'email' => $faker->email,
                'telefono' => '6' . $faker->randomNumber(8),
                'estado' => $faker->randomElement(['Fuera de trabajo', 'Disponible', 'Ocupado']),
                'habilitado' => $faker->boolean,
                'centro_id' => $faker->numberBetween(1, 7),
            ]);
        }
        DB::table('tecnicos')->insert([
            'nombre' => 'Jon',
            'apellido_p' => 'Santos',
            'apellido_s' => 'Barata',
            'email' => 'jon_t@jon.jon',
            'telefono' => '666666666',
            'estado' => 'Disponible',
            'habilitado' => 1,
            'centro_id' => 1,
        ]);
        DB::table('tecnicos')->insert([
            'nombre' => 'Eric',
            'apellido_p' => 'Muñoz',
            'apellido_s' => 'Fernández',
            'email' => 'eric.munoz@ikasle.egibide.org',
            'telefono' => '666666656',
            'estado' => 'Disponible',
            'habilitado' => 1,
            'centro_id' => 1,
        ]);
        DB::table('tecnicos')->insert([
            'nombre' => 'Julen',
            'apellido_p' => 'Prieto',
            'apellido_s' => 'Niño',
            'email' => 'julen.prieto@ikasle.egibide.org',
            'telefono' => '666666664',
            'estado' => 'Disponible',
            'habilitado' => 1,
            'centro_id' => 1,
        ]);
    }
}
