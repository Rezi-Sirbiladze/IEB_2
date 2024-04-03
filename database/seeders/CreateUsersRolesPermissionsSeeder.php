<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUsersRolesPermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'publish articles']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('edit articles', 'publish articles');

        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo('edit articles');

        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $editorUser = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => bcrypt('password'),
        ]);

        $adminUser->assignRole('admin');
        $editorUser->assignRole('editor');

        $this->command->info('Usuarios, roles y permisos creados exitosamente.');
    }
}
