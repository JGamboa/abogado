<?php

use Illuminate\Database\Seeder;
use App\Models\EstadoMateria;
use Carbon\Carbon;

class EstadosMateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoMateria::insert([
            ['materia_id' => 1, 'estadocaso_id' => 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 4, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 5, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 7, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 8, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 1, 'estadocaso_id' => 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' =>18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 21, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 2, 'estadocaso_id' => 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 17, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' =>18, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 19, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 20, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 21, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 22, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 23, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 3, 'estadocaso_id' => 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 15, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 4, 'estadocaso_id' => 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 13, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 14, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 5, 'estadocaso_id' => 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 2, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 3, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 15, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 12, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 9, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 6, 'estadocaso_id' => 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 1, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 24, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 25, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 11, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 26, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 27, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 6, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 15, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 16, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['materia_id' => 8, 'estadocaso_id' => 10, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]
        ]);
    }
}
