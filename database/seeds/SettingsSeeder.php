<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $data = [
//            [
//                'name' => 'Первый номер телефона в контактах',
//                'name_key'=>'first_num_contact',
//                'data'=>'+7 916 543 71 89',
//                'group'=>\App\Models\GroupSetting::getGroup('contacts'),
//                'type'=>\App\Models\TypeSetting::getType('input'),
//            ],
//            [
//                'name' => 'Второй номер телефона в контактах',
//                'name_key'=>'second_num_contact',
//                'data'=>'+7 916 676 23 18',
//                'group'=>\App\Models\GroupSetting::getGroup('contacts'),
//                'type'=>\App\Models\TypeSetting::getType('input'),
//            ],
//            [
//                'name' => 'Email в контактах',
//                'name_key'=>'email_contact',
//                'data'=>'1618e-mail.sale@gmail.com',
//                'group'=>\App\Models\GroupSetting::getGroup('contacts'),
//                'type'=>\App\Models\TypeSetting::getType('input'),
//            ],
//
//
//        ];
//        foreach ($data as $item){
//            (new \App\Models\Setting(['data'=>$item['data']]))->setSetting($item['type'],$item['group'],$item['name_key'],$item['name'])->save();
//        }
//
//

//        $dataSettings = [[
//            'name' => 'Instagram',
//            'name_key' => 'instagram',
//            'data' => 'https://www.instagram.com',
//            'group' => \App\Models\GroupSetting::getGroup('contacts'),
//            'type' => \App\Models\TypeSetting::getType('input'),
//        ],
//            [
//                'name' => 'Facebook',
//                'name_key' => 'facebook',
//                'data' => 'https://www.facebook.com/',
//                'group' => \App\Models\GroupSetting::getGroup('contacts'),
//                'type' => \App\Models\TypeSetting::getType('input'),
//            ]];
//        foreach ($dataSettings as $item){
//            (new \App\Models\Setting(['data'=>$item['data']]))->setSetting($item['type'],$item['group'],$item['name_key'],$item['name'])->save();
//        }
        $item=[
            'name' => 'Почта для обратной связи',
            'name_key' => 'feedback',
            'data' => '1618e-mail.sale@gmail.com',
            'group' => \App\Models\GroupSetting::getGroup('contacts'),
            'type' => \App\Models\TypeSetting::getType('input'),
        ];
        (new \App\Models\Setting(['data'=>$item['data']]))->setSetting($item['type'],$item['group'],$item['name_key'],$item['name'])->save();
    }
}
