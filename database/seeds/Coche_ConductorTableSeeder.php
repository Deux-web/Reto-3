<?php

use Illuminate\Database\Seeder;

class Coche_ConductorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('coche_conductor')->insert([
                'id_conductor' => $i,
                'id_coche' => $i,
            ]);
        }

        for ($i = 51; $i <= 150; $i++) {
            DB::table('coche_conductor')->insert([
                'id_conductor' => $i,
                'id_coche' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
