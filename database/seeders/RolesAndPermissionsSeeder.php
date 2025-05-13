<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Limpiar cache de permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos (solo si no existen)
        Permission::firstOrCreate(['name' => 'create piezas']);
        Permission::firstOrCreate(['name' => 'view piezas']);
        Permission::firstOrCreate(['name' => 'edit piezas']);
        Permission::firstOrCreate(['name' => 'delete piezas']);

        Permission::firstOrCreate(['name' => 'create yacimientos']);
        Permission::firstOrCreate(['name' => 'view yacimientos']);
        Permission::firstOrCreate(['name' => 'edit yacimientos']);
        Permission::firstOrCreate(['name' => 'delete yacimientos']);

        Permission::firstOrCreate(['name' => 'create arqueologos']);
        Permission::firstOrCreate(['name' => 'view arqueologos']);
        Permission::firstOrCreate(['name' => 'edit arqueologos']);
        Permission::firstOrCreate(['name' => 'delete arqueologos']);

        // Crear roles (solo si no existen)
        $arqueologoRole = Role::firstOrCreate(['name' => 'arqueologo']);
        $gestorRole = Role::firstOrCreate(['name' => 'gestor']);

        // Asignar permisos al rol de arqueólogo
        $arqueologoRole->syncPermissions([
            'create piezas',
            'view piezas',
            'view yacimientos'
        ]);

        // Asignar permisos al rol de gestor
        $gestorRole->syncPermissions([
            'create piezas',
            'view piezas',
            'edit piezas',
            'delete piezas',
            'create yacimientos',
            'view yacimientos',
            'edit yacimientos',
            'delete yacimientos',
            'create arqueologos',
            'view arqueologos',
            'edit arqueologos',
            'delete arqueologos'
        ]);
    }
}
