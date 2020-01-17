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

        for ($i = 0; $i < 50; $i++) {
            DB::table('coches')->insert([
                'matricula' => $faker->vehicleRegistration(),
                'marca' => $faker->vehicleBrand,
                'modelo' => $faker->vehicleModel,
                'anyo' => $faker->year('now'),
                'color' => $faker->safeColorName,
            ]);
        }
    }
}
