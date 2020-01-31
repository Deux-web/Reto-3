<?php

use Illuminate\Database\Seeder;

class CocheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('es_ES');
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        for ($i = 1; $i <= 50; $i++) {
            DB::table('coches')->insert([
                'id' => $i,
                'matricula' => $faker->vehicleRegistration(),
                'marca' => $faker->vehicleBrand,
                'modelo' => $faker->vehicleModel,
                'anyo' => $faker->year('now'),
                'color' => $faker->safeColorName,
            ]);
        }
        DB::table('coches')->insert([
            'id' => 51,
            'matricula' => '0225-CCN',
            'marca' => 'Mazda',
            'modelo' => 'MPV',
            'anyo' => '2001',
            'color' => 'Granate',
        ]);
    }
}
