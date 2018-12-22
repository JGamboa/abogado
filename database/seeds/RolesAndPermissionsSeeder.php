<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create roles
        $role = Role::create(['name' => 'SUPER ADMINISTRADOR', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]);
        Permission::insert([
           ['name'=> 'crear empresas', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver empresas', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar empresas', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar empresas', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'subir logotipo empresas', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'comentar casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'subir archivos casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar archivos casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver archivos casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver reporte casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear intervinientes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver intervinientes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar intervinientes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar intervinientes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear isapres', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver isapres', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar isapres', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar isapres', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear cortes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver cortes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar cortes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar cortes', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear materias', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver materias', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar materias', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar materias', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear sucursales', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver sucursales', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar sucursales', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar sucursales', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear estados casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver estados casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar estados casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar estados casos', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],

           ['name'=> 'crear localidades', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'ver localidades', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'editar localidades', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
           ['name'=> 'borrar localidades', 'guard_name'=> 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]
        ]);
    }
}

