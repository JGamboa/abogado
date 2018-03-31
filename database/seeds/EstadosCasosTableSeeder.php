<?php

use Illuminate\Database\Seeder;
use App\Models\EstadoCaso;

class EstadosCasosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        EstadoCaso::create([
            'nombre' => 'En preparación',
        ]);

        EstadoCaso::create([
            'nombre' => 'Presentada',
        ]);

        EstadoCaso::create([
            'nombre' => 'Notificada',
        ]);

        EstadoCaso::create([
            'nombre' => 'Comparendo',
        ]);

        EstadoCaso::create([
            'nombre' => 'Diligencias ',
        ]);

        EstadoCaso::create([
            'nombre' => 'Sentencia',
        ]);

        EstadoCaso::create([
            'nombre' => 'Apelación',
        ]);

        EstadoCaso::create([
            'nombre' => 'Queja',
        ]);

        EstadoCaso::create([
            'nombre' => 'Cumplimiento',
        ]);

        EstadoCaso::create([
            'nombre' => 'Archivada',
        ]);

        EstadoCaso::create([
            'nombre' => 'Audiencias',
        ]);

        EstadoCaso::create([
            'nombre' => 'Acuerdo',
        ]);

        EstadoCaso::create([
            'nombre' => 'Nulidad',
        ]);

        EstadoCaso::create([
            'nombre' => 'RUJ',
        ]);

        EstadoCaso::create([
            'nombre' => 'Apelación',
        ]);

        EstadoCaso::create([
            'nombre' => 'Otro',
        ]);

        EstadoCaso::create([
            'nombre' => 'Interpuesto',
        ]);

        EstadoCaso::create([
            'nombre' => 'ONI',
        ]);

        EstadoCaso::create([
            'nombre' => 'Acogida C/C',
        ]);

        EstadoCaso::create([
            'nombre' => 'Acogida S/C',
        ]);

        EstadoCaso::create([
            'nombre' => 'Apelación CS',
        ]);

        EstadoCaso::create([
            'nombre' => 'Para Pago',
        ]);

        EstadoCaso::create([
            'nombre' => 'Cobrada',
        ]);

        EstadoCaso::create([
            'nombre' => 'Interpuesta',
        ]);

        EstadoCaso::create([
            'nombre' => 'A la espera de designación Liq',
        ]);

        EstadoCaso::create([
            'nombre' => 'Incautación',
        ]);

        EstadoCaso::create([
            'nombre' => 'Remate',
        ]);

    }
}
