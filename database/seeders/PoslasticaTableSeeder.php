<?php

namespace Database\Seeders;

use App\Models\Poslastica;
use Illuminate\Database\Seeder;

class PoslasticaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {

            Poslastica::create([
                'naziv' => $faker->firstName('female'),
                'recept' => $faker->sentence(50),
                'ukusId' => rand(1,6),
                'vrstaId' => rand(1,4),
            ]);
        }
    }
}
