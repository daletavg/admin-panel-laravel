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
//        $this->call(StockSeeder::class);

    }
}
