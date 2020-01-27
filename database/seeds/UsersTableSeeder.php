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
    }
}
