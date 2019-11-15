<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\User([
            'username'=>'admin',
            'password' => '$2y$10$rzISOQi3roSr2tE.143Tsu8CfPAvPYhyhkcQxL4Ko.Mx.Tt7p7l2C'
        ]);
        $admin->save();
        $superadmin = new \App\Models\User([
            'username'=>'superadmin',
            'password' => '$2y$10$49kkbVTlaji4IsgN7W5nJOefUThkKfChSvzgidQkALeQZmNGLjuu.'
        ]);
        $superadmin->save();
        $superadmin->assignRole('supper_admin');
        $admin->assignRole('admin');
    }
}
