<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RegionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $connection = config('database.default');

        if($connection == "sqlsrv") {
            DB::statement('SET IDENTITY_INSERT regiones ON');
        }
        DB::table('regiones')->insert([
                    'id' => 1,
                    'pais_id' => 1,
                    'nombre' => 'Región de Tarapacá',
                    'ISO_3166_2_CL'=> 'CL-TA',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 2,
                    'pais_id' => 1,
                    'nombre' => 'Región de Antofagasta',
                    'ISO_3166_2_CL'=> 'CL-AN',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 3,
                    'pais_id' => 1,
                    'nombre' => 'Región de Atacama',
                    'ISO_3166_2_CL'=> 'CL-AT',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 4,
                    'pais_id' => 1,
                    'nombre' => 'Región de Coquimbo',
                    'ISO_3166_2_CL'=> 'CL-CO',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 5,
                    'pais_id' => 1,
                    'nombre' => 'Región de Valparaíso',
                    'ISO_3166_2_CL'=> 'CL-VS',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 6,
                    'pais_id' => 1,
                    'nombre' => 'Región del Libertador Gral. Bernardo O\'Higgins',
                    'ISO_3166_2_CL'=> 'CL-LI',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 7,
                    'pais_id' => 1,
                    'nombre' => 'Región del Maule',
                    'ISO_3166_2_CL'=> 'CL-ML',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 8,
                    'pais_id' => 1,
                    'nombre' => 'Región del Biobío',
                    'ISO_3166_2_CL'=> 'CL-BI',
                   'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 9,
                    'pais_id' => 1,
                    'nombre' => 'Región de la Araucanía',
                    'ISO_3166_2_CL'=> 'CL-AR',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 10,
                    'pais_id' => 1,
                    'nombre' => 'Región de Los Lagos',
                    'ISO_3166_2_CL'=> 'CL-LL',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 11,
                    'pais_id' => 1,
                    'nombre' => 'Región Aisén del Gral. Carlos Ibáñez del Campo',
                    'ISO_3166_2_CL'=> 'CL-AI',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 12,
                    'pais_id' => 1,
                    'nombre' => 'Región de Magallanes y de la Antártica Chilena',
                    'ISO_3166_2_CL'=> 'CL-MA',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 13,
                    'pais_id' => 1,
                    'nombre' => 'Región Metropolitana de Santiago',
                    'ISO_3166_2_CL'=> 'CL-RM',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 14,
                    'pais_id' => 1,
                    'nombre' => 'Región de Los Ríos',
                    'ISO_3166_2_CL'=> 'CL-LR',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('regiones')->insert([
                    'id' => 15,
                    'pais_id' => 1,
                    'nombre' => 'Arica y Parinacota',
                    'ISO_3166_2_CL'=> 'CL-AP',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

        if($connection == "sqlsrv") {
            DB::statement('SET IDENTITY_INSERT regiones OFF');
        }
    }
}
