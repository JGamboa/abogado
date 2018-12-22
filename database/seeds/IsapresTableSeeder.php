<?php

use Illuminate\Database\Seeder;
use App\Models\Isapre;
use Carbon\Carbon;

class IsapresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Isapre::insert(
        [
            ['nombre' => 'Sin Isapre', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Banmédica', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Consalud', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'VidaTres', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Colmena', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Isapre Cruz Blanca S.A.', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Nueva Masvida', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]
        ]
        );
    }
}
