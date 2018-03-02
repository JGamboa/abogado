<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('pais')->insert([
            'codigo_pais' => 'CL',
            'nombre' => 'CHILE',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }

}
