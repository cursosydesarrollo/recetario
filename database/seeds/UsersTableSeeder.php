<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creamos al usuario
        $user = factory(User::class)->create(['email' => 'gbelot@test.com']);
        
        // Le asignamos el rol de administrador
        $user->assignRole('administrador');

    }
}
