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
        $connection = config('database.default');

        if($connection == "sqlsrv"){
            DB::statement('SET IDENTITY_INSERT provincias ON');
        }

        DB::table('provincias')->insert([
                    'id' => 1,
                    'nombre' => 'Arica',
                    'regiones_id'=> 15,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('provincias')->insert([
                    'id' => 2,
                    'nombre' => 'Parinacota',
                    'regiones_id'=> 15,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 3,
                    'nombre' => 'Iquique',
                    'regiones_id'=> 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 4,
                    'nombre' => 'Tamarugal',
                    'regiones_id'=> 1,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 5,
                    'nombre' => 'Antofagasta',
                    'regiones_id'=> 2,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 6,
                    'nombre' => 'El Loa',
                    'regiones_id'=> 2,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 7,
                    'nombre' => 'Tocopilla',
                    'regiones_id'=> 2,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 8,
                    'nombre' => 'Copiapó',
                    'regiones_id'=> 3,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 9,
                    'nombre' => 'Chañaral',
                    'regiones_id'=> 3,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 10,
                    'nombre' => 'Huasco',
                    'regiones_id'=> 3,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 11,
                    'nombre' => 'Elqui',
                    'regiones_id'=> 4,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 12,
                    'nombre' => 'Choapa',
                    'regiones_id'=> 4,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 13,
                    'nombre' => 'Limarí',
                    'regiones_id'=> 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 14,
                    'nombre' => 'Valparaíso',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 15,
                    'nombre' => 'Isla de Pascua',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 16,
                    'nombre' => 'Los Andes',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 17,
                    'nombre' => 'Petorca',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 18,
                    'nombre' => 'Quillota',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 19,
                    'nombre' => 'San Antonio',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 20,
                    'nombre' => 'San Felipe de Aconcagua',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 21,
                    'nombre' => 'Marga Marga',
                    'regiones_id'=> 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 22,
                    'nombre' => 'Cachapoal',
                    'regiones_id'=> 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 23,
                    'nombre' => 'Cardenal Caro',
                    'regiones_id'=> 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 24,
                    'nombre' => 'Colchagua',
                    'regiones_id'=> 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 25,
                    'nombre' => 'Talca',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 26,
                    'nombre' => 'Cauquenes',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 27,
                    'nombre' => 'Curicó',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 28,
                    'nombre' => 'Linares',
                    'regiones_id'=> 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 29,
                    'nombre' => 'Concepción',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 30,
                    'nombre' => 'Arauco',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 31,
                    'nombre' => 'Biobío',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 32,
                    'nombre' => 'Ñuble',
                    'regiones_id'=> 8,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 33,
                    'nombre' => 'Cautín',
                    'regiones_id'=> 9,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 34,
                    'nombre' => 'Malleco',
                    'regiones_id'=> 9,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 35,
                    'nombre' => 'Valdivia',
                    'regiones_id'=> 14,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 36,
                    'nombre' => 'Ranco',
                    'regiones_id'=> 14,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 37,
                    'nombre' => 'Llanquihue',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 38,
                    'nombre' => 'Chiloé',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 39,
                    'nombre' => 'Osorno',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 40,
                    'nombre' => 'Palena',
                    'regiones_id'=> 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 41,
                    'nombre' => 'Coihaique',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 42,
                    'nombre' => 'Aisén',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 43,
                    'nombre' => 'Capitán Prat',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 44,
                    'nombre' => 'General Carrera',
                    'regiones_id'=> 11,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 45,
                    'nombre' => 'Magallanes',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 46,
                    'nombre' => 'Antártica Chilena',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 47,
                    'nombre' => 'Tierra del Fuego',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 48,
                    'nombre' => 'Última Esperanza',
                    'regiones_id'=> 12,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 49,
                    'nombre' => 'Santiago',
                    'regiones_id'=> 13,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 50,
                    'nombre' => 'Cordillera',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 51,
                    'nombre' => 'Chacabuco',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 52,
                    'nombre' => 'Maipo',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 53,
                    'nombre' => 'Melipilla',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
        DB::table('provincias')->insert([
                    'id' => 54,
                    'nombre' => 'Talagante',
                    'regiones_id'=> 13,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);

        if($connection == "sqlsrv") {
            DB::statement('SET IDENTITY_INSERT provincias OFF');
        }
    }
}
