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

        for($i =0;$i < 21;$i++){
            DB::table('tecnicos') -> insert([

                'nombre'=>$faker->firstName,
                'apellido_p'=>$faker->lastName,
                'apellido_s'=>$faker->lastName,
                'email'=>$faker->email,
                'telefono' => '6' . $faker->randomNumber(8),
                'estado' =>$faker->randomElement(['Fuera de trabajo','Disponible','Ocupado']),
                'habilitado'=>$faker->boolean,
                'id_centro'=>$faker->numberBetween(1,7),
            ]);
        }
    }
}