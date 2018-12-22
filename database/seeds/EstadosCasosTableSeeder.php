<?php

use Illuminate\Database\Seeder;
use App\Models\EstadoCaso;
use Carbon\Carbon;

class EstadosCasosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        EstadoCaso::insert(
        [
            ['nombre' => 'En preparación', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Presentada', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Notificada', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Comparendo', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Diligencias ', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Sentencia', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Apelación', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Queja', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Cumplimiento', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Archivada', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Audiencias', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Acuerdo', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Nulidad', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'RUJ', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Apelación', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Otro', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Interpuesto', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'ONI', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Acogida C/C', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Acogida S/C', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Apelación CS', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Para Pago', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Cobrada', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Interpuesta', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'A la espera de designación Liq', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Incautación', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['nombre' => 'Remate', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]
        ]
        );

    }
}
