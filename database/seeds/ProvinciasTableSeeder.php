<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $connection = env('DB_CONNECTION');

        if($connection == "sqlsrv"){
            DB::statement('SET IDENTITY_INSERT provincias ON');
        }

        DB::table('provincias')->insert([

                    'nombre' => 'Arica',
                    'regiones_id'=> 15,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Parinacota',
                    'regiones_id'=> 15,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Iquique',
                    'regiones_id'=> 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Tamarugal',
                    'regiones_id'=> 1,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Antofagasta',
                    'regiones_id'=> 2,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'El Loa',
                    'regiones_id'=> 2,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Tocopilla',
                    'regiones_id'=> 2,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Copiapó',
                    'regiones_id'=> 3,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Chañaral',
                    'regiones_id'=> 3,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Huasco',
                    'regiones_id'=> 3,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Elqui',
                    'regiones_id'=> 4,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Choapa',
                    'regiones_id'=> 4,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Limarí',
                    'regiones_id'=> 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Valparaíso',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Isla de Pascua',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Los Andes',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Petorca',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Quillota',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'San Antonio',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'San Felipe de Aconcagua',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Marga Marga',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Cachapoal',
                    'regiones_id'=> 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Cardenal Caro',
                    'regiones_id'=> 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Colchagua',
                    'regiones_id'=> 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Talca',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Cauquenes',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Curicó',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Linares',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Concepción',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Arauco',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Biobío',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Ñuble',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Cautín',
                    'regiones_id'=> 9,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Malleco',
                    'regiones_id'=> 9,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Valdivia',
                    'regiones_id'=> 14,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Ranco',
                    'regiones_id'=> 14,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Llanquihue',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Chiloé',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Osorno',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Palena',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Coihaique',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Aisén',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Capitán Prat',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'General Carrera',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Magallanes',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Antártica Chilena',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Tierra del Fuego',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Última Esperanza',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Santiago',
                    'regiones_id'=> 13,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Cordillera',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Chacabuco',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Maipo',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Melipilla',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([

                    'nombre' => 'Talagante',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
    }
}
