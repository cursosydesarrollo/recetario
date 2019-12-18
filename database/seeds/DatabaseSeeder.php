<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // se crean primer los permisos
        $this->call(PermissionsTableSeeder::class);
        
        // Agregamos los roles
        $this->call(RolesTableSeeder::class);
        
        // ingresamos los usuarios
        $this->call(UsersTableSeeder::class);
        
        // generamos las recetas
        $this->call(RecetasTableSeeder::class);
    }
}
