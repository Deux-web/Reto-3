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
        $faker=\Faker\Factory::create();

        DB::table('centros')->insert([
            'nombre'=>'Agurain',
            'direccion'=>'42.8510665,-2.3828899',
            'provincia'=>'Alava',
            'persona_contacto'=>$faker->firstName,
            'telefono'=>'6'.$faker->randomNumber(8),
            'horario'=>'9:00-21:00',
            'email'=>$faker->email,
        ]);
        DB::table('centros')->insert([
            'nombre'=>'Basauri',
            'direccion'=>'43.2346347,-2.8971273',
            'provincia'=>'Vizcaya',
            'persona_contacto'=>$faker->firstName,
            'telefono'=>'6'.$faker->randomNumber(8),
            'horario'=>'9:00-21:00',
            'email'=>$faker->email,
        ]);
        DB::table('centros')->insert([
            'nombre'=>'Durango',
            'direccion'=>'43.1693228,-2.6400451',
            'provincia'=>'Vizcaya',
            'persona_contacto'=>$faker->firstName,
            'telefono'=>'6'.$faker->randomNumber(8),
            'horario'=>'9:00-21:00',
            'email'=>$faker->email,
        ]);
        DB::table('centros')->insert([
            'nombre'=>'Usurbil',
            'direccion'=>'43.270666,-2.0445099',
            'provincia'=>'Guipuzcoa',
            'persona_contacto'=>$faker->firstName,
            'telefono'=>'6'.$faker->randomNumber(8),
            'horario'=>'9:00-21:00',
            'email'=>$faker->email,
        ]);
        DB::table('centros')->insert([
            'nombre'=>'Azkoitia',
            'direccion'=>'43.1735535,-2.3254154',
            'provincia'=>'Guipuzcoa',
            'persona_contacto'=>$faker->firstName,
            'telefono'=>'6'.$faker->randomNumber(8),
            'horario'=>'9:00-21:00',
            'email'=>$faker->email,
        ]);
        DB::table('centros')->insert([
            'nombre'=>'Baranyain',
            'direccion'=>'42.807717,-1.6917302',
            'provincia'=>'Navarra',
            'persona_contacto'=>$faker->firstName,
            'telefono'=>'6'.$faker->randomNumber(8),
            'horario'=>'9:00-21:00',
            'email'=>$faker->email,
        ]);
        DB::table('centros')->insert([
            'nombre'=>'Tafalla',
            'direccion'=>'42.5194469,-1.680899',
            'provincia'=>'Navarra',
            'persona_contacto'=>$faker->firstName,
            'telefono'=>'6'.$faker->randomNumber(8),
            'horario'=>'9:00-21:00',
            'email'=>$faker->email,
        ]);

    }
}
