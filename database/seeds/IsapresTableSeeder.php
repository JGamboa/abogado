<?php

use Illuminate\Database\Seeder;
use App\Models\Isapre;

class IsapresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Isapre::create([
            'nombre' => 'Sin Isapre',
        ]);

        Isapre::create([
            'nombre' => 'Banmédica',
        ]);

        Isapre::create([
            'nombre' => 'Consalud',
        ]);

        Isapre::create([
            'nombre' => 'VidaTres',
        ]);

        Isapre::create([
            'nombre' => 'Colmena',
        ]);

        Isapre::create([
            'nombre' => 'Isapre Cruz Blanca S.A.',
        ]);

        Isapre::create([
            'nombre' => 'Nueva Masvida',
        ]);
    }
}
