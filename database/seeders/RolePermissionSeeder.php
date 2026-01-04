<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
       
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        
        $permissions = [
            'create loan',
            'edit loan',
            'delete loan',
            'view loan',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

       
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        $adminRole->givePermissionTo(Permission::all());
        $userRole->givePermissionTo(['view loan', 'create loan']);

     
        $user = User::first(); 
        if ($user) {
            $user->assignRole('admin');
        }
    }
}

