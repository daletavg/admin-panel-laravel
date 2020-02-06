<?php

use Illuminate\Database\Seeder;

class GlobalSeoSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generalSeo = new \App\Models\GlobalSeoSetting();
        $generalSeo->save();
    }
}
