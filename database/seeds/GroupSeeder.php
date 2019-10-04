<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            'name'=>'Контакты',
            'name_key'=>'contacts'
        ];
        (new \App\Models\GroupSetting())->fill($data)->save();
    }
}
