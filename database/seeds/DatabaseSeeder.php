<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CentroTableSeeder::class,
            TecnicoTableSeeder::class,
            CocheTableSeeder::class,
            ConductorTableSeeder::class,
            Coche_ConductorTableSeeder::class,
        ]);
    }
}
