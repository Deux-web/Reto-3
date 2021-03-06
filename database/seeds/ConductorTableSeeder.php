<?php

use Illuminate\Database\Seeder;

class ConductorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');
        $faker->addProvider(new Faker\Provider\es_ES\Person($faker));

        for ($i = 1; $i <= 50; $i++) {

            DB::table('conductors')->insert([
                'id' => $i,

                'dni' => $faker->dni,
                'nombre' => $faker->firstName,
                'apellido_p' => $faker->lastName,
                'apellido_s' => $faker->lastName,
                'titular' => '1',
                'fecha_nac' => $faker->numberBetween(1945, 2002),
                'fecha_carnet' => $faker->date('Y-m-d'),
                'direccion' => $faker->address,
                'telefono' => '6' . $faker->randomNumber(8),
                'email' => $faker->email
            ]);
        }
        for ($i = 1; $i <= 100; $i++) {
            DB::table('conductors')->insert([
                'id' => $i+50,
                'dni' => $faker->dni,
                'nombre' => $faker->firstName,
                'apellido_p' => $faker->lastName,
                'apellido_s' => $faker->lastName,
                'titular' => '0',
                'fecha_nac' => $faker->numberBetween(1945, 2002),
                'fecha_carnet' => $faker->date('Y-m-d'),
                'direccion' => $faker->address,
                'telefono' => '6' . $faker->randomNumber(8),
                'email' => $faker->email
            ]);
        }
        DB::table('conductors')->insert([
            'id' => 160,
            'dni' => '72852975S',
            'nombre' => 'Jon',
            'apellido_p' => 'Santos',
            'apellido_s' => 'Barata',
            'titular' => '1',
            'fecha_nac' => $faker->numberBetween(1945, 2002),
            'fecha_carnet' => $faker->date('Y-m-d'),
            'direccion' => $faker->address,
            'telefono' => '6' . $faker->randomNumber(8),
            'email' => $faker->email
        ]);
    }
}
