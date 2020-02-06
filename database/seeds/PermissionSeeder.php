<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()['cache']->forget('spatie.permission.cache');
        $admin = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $superadmin = \Spatie\Permission\Models\Role::create(['name' => 'supper_admin']);
//        $permission = \Spatie\Permission\Models\Permission::create(['name' => 'Полный доступ']);
//        $superadmin->givePermissionTo($permission);
        $permissions = array();
        array_push($permissions,
            \Spatie\Permission\Models\Permission::create(['name' => 'posters']),
            \Spatie\Permission\Models\Permission::create(['name' => 'about']),
            \Spatie\Permission\Models\Permission::create(['name' => 'settings']),

            \Spatie\Permission\Models\Permission::create(['name' => 'create_posters']),
            \Spatie\Permission\Models\Permission::create(['name' => 'edit_posters']),
            \Spatie\Permission\Models\Permission::create(['name' => 'remove_posters']),

            \Spatie\Permission\Models\Permission::create(['name' => 'create_about']),
            \Spatie\Permission\Models\Permission::create(['name' => 'edit_about']),
            \Spatie\Permission\Models\Permission::create(['name' => 'remove_about']),

             \Spatie\Permission\Models\Permission::create(['name' => 'create_settings']),
            \Spatie\Permission\Models\Permission::create(['name' => 'edit_settings']),
            \Spatie\Permission\Models\Permission::create(['name' => 'remove_settings'])
            );
        $superAdminPermission = array();
        array_push($superAdminPermission,
            \Spatie\Permission\Models\Permission::create(['name' => 'translate']),
            \Spatie\Permission\Models\Permission::create(['name' => 'create_translate']),
            \Spatie\Permission\Models\Permission::create(['name' => 'edit_translate']),
            \Spatie\Permission\Models\Permission::create(['name' => 'remove_translate']),

            \Spatie\Permission\Models\Permission::create(['name' => 'languages']),
            \Spatie\Permission\Models\Permission::create(['name' => 'power_languages']),
            \Spatie\Permission\Models\Permission::create(['name' => 'add_languages']),
            \Spatie\Permission\Models\Permission::create(['name' => 'remove_languages'])
        );



        foreach ($permissions as $perm){
            $superadmin->givePermissionTo($perm);
            $admin->givePermissionTo($perm);
        }
        foreach ($superAdminPermission as $perm){
            $superadmin->givePermissionTo($perm);
        }

    }

}
