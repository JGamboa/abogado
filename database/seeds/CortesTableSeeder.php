<?php

use Illuminate\Database\Seeder;
use App\Models\Corte;

class CortesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $corte = Corte::create([
            'nombre' => 'C.A. de Arica',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Iquique',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Antofagasta',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Copiapó',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de la Serena',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Valparaíso',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Santiago',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de San Miguel',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Rancagua',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Talca',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Chillán',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Concepción',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Temuco',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Valdivia',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Puerto Montt',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Coyahique',
        ]);

        $corte = Corte::create([
            'nombre' => 'C.A. de Punta Arenas',
        ]);


    }
}
