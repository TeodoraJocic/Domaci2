<?php

namespace Database\Seeders;

use App\Models\Vrsta;
use Illuminate\Database\Seeder;

class VrstaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vrsta::create([
            'vrsta' => 'Torta'
        ]);
        
        Vrsta::create([
            'vrsta' => 'Kup'
        ]);

        Vrsta::create([
            'vrsta' => 'Kolac'
        ]);

        Vrsta::create([
            'vrsta' => 'Tart'
        ]);
    }
}
