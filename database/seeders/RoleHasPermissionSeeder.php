<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // Admin: todos los permissos
        $admin_permissions = Permission::all();
        // findOrfail -> primer rol que es admin
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // User
        $user_permissions = $admin_permissions->filter(function ($permission) {
            // se define lo que no se quiere que vea el usuario
            return substr($permission->name, 0, 5) != 'user_' &&
                substr($permission->name, 0, 5) != 'role_' &&
                substr($permission->name, 0, 11) != 'permission_';
        });
        // findOrfail -> segundo rol que es admin
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
