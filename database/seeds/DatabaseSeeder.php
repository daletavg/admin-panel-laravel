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
//        $this->call(ServiceSeeder::class);
        $this->call(TypeSettingsSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(GlobalSeoSettingsSeeder::class);
        $this->call(UsersSeeder::class);

    }
}
