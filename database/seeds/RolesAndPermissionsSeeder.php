<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create roles
        $role = Role::create(['name' => 'SUPER ADMINISTRADOR']);

        $permission = Permission::create(['name'=> 'crear empresas']);
        $permission = Permission::create(['name'=> 'ver empresas']);
        $permission = Permission::create(['name'=> 'editar empresas']);
        $permission = Permission::create(['name'=> 'borrar empresas']);

        $permission = Permission::create(['name'=> 'crear casos']);
        $permission = Permission::create(['name'=> 'ver casos']);
        $permission = Permission::create(['name'=> 'editar casos']);
        $permission = Permission::create(['name'=> 'borrar casos']);
        $permission = Permission::create(['name'=> 'comentar casos']);
        $permission = Permission::create(['name'=> 'subir archivos casos']);
        $permission = Permission::create(['name'=> 'ver archivos casos']);
        $permission = Permission::create(['name'=> 'ver reporte casos']);

        $permission = Permission::create(['name'=> 'crear intervinientes']);
        $permission = Permission::create(['name'=> 'ver intervinientes']);
        $permission = Permission::create(['name'=> 'editar intervinientes']);
        $permission = Permission::create(['name'=> 'borrar intervinientes']);

        $permission = Permission::create(['name'=> 'crear isapres']);
        $permission = Permission::create(['name'=> 'ver isapres']);
        $permission = Permission::create(['name'=> 'editar isapres']);
        $permission = Permission::create(['name'=> 'borrar isapres']);

        $permission = Permission::create(['name'=> 'crear cortes']);
        $permission = Permission::create(['name'=> 'ver cortes']);
        $permission = Permission::create(['name'=> 'editar cortes']);
        $permission = Permission::create(['name'=> 'borrar cortes']);

        $permission = Permission::create(['name'=> 'crear materias']);
        $permission = Permission::create(['name'=> 'ver materias']);
        $permission = Permission::create(['name'=> 'editar materias']);
        $permission = Permission::create(['name'=> 'borrar materias']);

        $permission = Permission::create(['name'=> 'crear sucursales']);
        $permission = Permission::create(['name'=> 'ver sucursales']);
        $permission = Permission::create(['name'=> 'editar sucursales']);
        $permission = Permission::create(['name'=> 'borrar sucursales']);

        $permission = Permission::create(['name'=> 'crear estados casos']);
        $permission = Permission::create(['name'=> 'ver estados casos']);
        $permission = Permission::create(['name'=> 'editar estados casos']);
        $permission = Permission::create(['name'=> 'borrar estados casos']);

        $permission = Permission::create(['name'=> 'crear localidades']);
        $permission = Permission::create(['name'=> 'ver localidades']);
        $permission = Permission::create(['name'=> 'editar localidades']);
        $permission = Permission::create(['name'=> 'borrar localidades']);


    }
}

