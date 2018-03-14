<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

         $this->call(PaisTableSeeder::class);
         $this->call(RegionesTableSeeder::class);
         $this->call(ProvinciasTableSeeder::class);
         $this->call(ComunasTableSeeder::class);
         $this->call(RolesAndPermissionsSeeder::class);
         $this->call(UserSeed::class);
         $this->call(EmpresaTableSeeder::class);
         $this->call(EmpleadoTableSeeder::class);
         $this->call(IsapresTableSeeder::class);
         $this->call(CortesTableSeeder::class);

    }
}
