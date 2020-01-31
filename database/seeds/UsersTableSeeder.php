<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'jon_t@jon.jon',
            'name' => 'Jon',
            'password' => '$2y$10$AJBDTn11D2UrwloGLEklaOmL/nZLUKTKL561Ba89/O29Kh.qMfN5m',
            'apellido_p' => 'Santos',
            'apellido_s' => 'Barata',
            'rol' => 'TECNICO'
        ]);
        DB::table('users')->insert([
            'email' => 'jon@jon.jon',
            'name' => 'Jon',
            'password' => '$2y$10$AJBDTn11D2UrwloGLEklaOmL/nZLUKTKL561Ba89/O29Kh.qMfN5m',
            'apellido_p' => 'Santos',
            'apellido_s' => 'Barata',
            'rol' => 'OPERARIO'
        ]);
        DB::table('users')->insert([
            'email' => 'jon_g@jon.jon',
            'name' => 'Jon',
            'password' => '$2y$10$AJBDTn11D2UrwloGLEklaOmL/nZLUKTKL561Ba89/O29Kh.qMfN5m',
            'apellido_p' => 'Santos',
            'apellido_s' => 'Barata',
            'rol' => 'GERENTE'
        ]);
        DB::table('users')->insert([
            'email' => 'jon_c@jon.jon',
            'name' => 'Jon',
            'password' => '$2y$10$AJBDTn11D2UrwloGLEklaOmL/nZLUKTKL561Ba89/O29Kh.qMfN5m',
            'apellido_p' => 'Santos',
            'apellido_s' => 'Barata',
            'rol' => 'COORDINADOR'
        ]);
        $faker = \Faker\Factory::create('es_ES');

        for ($i = 0; $i <= 50; $i++) {
            DB::table('users')->insert([
                'email' => 'tecnico' . $i . '@tecnico.tecnico',
                'name' => $faker->firstName,
                'password' => '$2y$10$AJBDTn11D2UrwloGLEklaOmL/nZLUKTKL561Ba89/O29Kh.qMfN5m',
                'apellido_p' => $faker->lastName,
                'apellido_s' => $faker->lastName,
                'rol' => 'TECNICO'
            ]);
        }
        DB::table('users')->insert([
            'email' => 'julen.prieto@ikasle.egibide.org',
            'name' => 'Julen',
            'password' => \Illuminate\Support\Facades\Hash::make('jonjonjon'),
            'apellido_p' => 'Prieto',
            'apellido_s' => 'Nino',
            'rol' => 'TECNICO'
        ]);
    }
}
