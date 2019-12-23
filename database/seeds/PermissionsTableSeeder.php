<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_permissions')->delete();
        DB::table('permissions')->delete();

        $permissions = [
            // Permisos de administrador
            'ver usuarios', 'crear usuarios', 'editar usuarios', 'suspender usuarios',
            'editar perfil',
            'ver roles', 'crear roles', 'editar roles', 'suspender roles',
            'crear recetas', 'editar recetas', 'eliminar recetas', 'editar recetas propias', 'eliminar recetas propias',
            'editar recetas no publicadas'
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    
    }
}
