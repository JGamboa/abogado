<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Sucursal;
use Spatie\Permission\Models\Role;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to seed Random Empresa information ?')) {
            $empresa = Empresa::create([
                'rut' => '76250838-9',
                'razon_social' => 'ASESORIA DISENO E INGENIERIA SPA',
                'nombre_fantasia' => 'ADICHILE SPA',
                'direccion' => '1 NORTE 461 OF 703',
                'comunas_id' => 47,
                'provincias_id' => 14
            ]);

            $sucursal = Sucursal::create([
                'empresa_id' => $empresa->id,
                'nombre' => 'CASA MATRIZ',
                'direccion' => '1 NORTE 461 OF 703',
                'comunas_id' => 47,
                'provincias_id' => 14,
                'tipo' => 1
            ]);

            $role = Role::create(['name' => 'SECRETARIA', 'empresa_id' => $empresa->id]);
            $role = Role::create(['name' => 'CAPTADOR', 'empresa_id' => $empresa->id]);
        }

    }
}
