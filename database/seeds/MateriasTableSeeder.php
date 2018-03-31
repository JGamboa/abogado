<?php

use Illuminate\Database\Seeder;
use App\Models\Materia;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $materia = Materia::create([
            'nombre' => 'CONSUMIDOR',
        ]);

        $materia = Materia::create([
            'nombre' => 'ISAPRE / ADE',
        ]);

        $materia = Materia::create([
            'nombre' => 'ISAPRE / GES',
        ]);

        $materia = Materia::create([
            'nombre' => 'CIVIL',
        ]);

        $materia = Materia::create([
            'nombre' => 'LABORAL',
        ]);

        $materia = Materia::create([
            'nombre' => 'FAMILIA',
        ]);

        $materia = Materia::create([
            'nombre' => 'OTRO',
        ]);

        $materia = Materia::create([
            'nombre' => 'LEY 20.720',
        ]);

    }
}
