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
        $data = [
            [
                'name' => 'Первый номер телефона в контактах',
                'name_key'=>'first_num_contact',
                'data'=>'+8 800 555 35 35',
                'group'=>\App\Models\GroupSetting::getGroup('contacts'),
                'type'=>\App\Models\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Второй номер телефона в контактах',
                'name_key'=>'second_num_contact',
                'data'=>'+8 800 555 35 35',
                'group'=>\App\Models\GroupSetting::getGroup('contacts'),
                'type'=>\App\Models\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Email в контактах',
                'name_key'=>'email_contact',
                'data'=>'feedback@gmail.com',
                'group'=>\App\Models\GroupSetting::getGroup('contacts'),
                'type'=>\App\Models\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Instagram',
                'name_key' => 'instagram',
                'data' => 'https://www.instagram.com',
                'group' => \App\Models\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Facebook',
                'name_key' => 'facebook',
                'data' => 'https://www.facebook.com/',
                'group' => \App\Models\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Youtube',
                'name_key' => 'youtube',
                'data' => 'https://www.youtube.com/',
                'group' => \App\Models\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Telegram',
                'name_key' => 'telegram',
                'data' => 'https://web.telegram.org',
                'group' => \App\Models\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Почта для обратной связи',
                'name_key' => 'feedback',
                'data' => 'mail@gmail.com',
                'group' => \App\Models\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\TypeSetting::getType('input'),
            ]

        ];
        foreach ($data as $item){
            (new \App\Models\Setting(['data'=>$item['data']]))->setSetting($item['type'],$item['group'],$item['name_key'],$item['name'])->save();
        }

    }
}
