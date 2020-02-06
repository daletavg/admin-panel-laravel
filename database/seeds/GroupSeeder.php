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
            [
                'name'=>'Contacts',
                'name_key'=>'contacts'
            ],
            [
                'name'=>'Emails',
                'name_key'=>'emails'
            ],
            [
                'name'=>'Соц. сети',
                'name_key'=>'social'
            ],
        ];
        foreach($data as $item) {
            (new \App\Models\Settings\GroupSetting())->fill($item)->save();
        }
    }
}
