<?php

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Quieres crear un empleado inicial ?')) {
            $empleado = Empleado::create([
                'empresa_id' => 1,
                'nombres' => 'lorem',
                'apellido_paterno' => 'ipsum',
                'apellido_materno' => 'ipsum',
                'admin' => false
            ]);
        }

    }
}
