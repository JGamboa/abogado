<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'ADMIN',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('SUPER ADMINISTRADOR');

        $this->command->info('Here is your admin details to login:');
        $this->command->warn($user->email);
        $this->command->warn('Password is "password"');

    }
}
