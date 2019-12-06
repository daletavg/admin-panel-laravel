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
                'name' => 'Первый представитель',
                'name_key' => 'first_person_contact',
                'data' =>
                    [
                        'data'=>'Юрий Иванов',
                        'has_lang_data'=>true,
                    ],
                'has_lang_data' => true,
                'group' => \App\Models\Settings\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Первый номер телефона в контактах',
                'name_key' => 'first_num_contact',
                'data' =>[
                    'data'=>'+8 800 555 35 35',

                ],
                'group' => \App\Models\Settings\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Второй представитель',
                'name_key' => 'second_person_contact',
                'has_lang_data' => true,
                'data' =>
                    [
                        'data'=>'Юрий Титарь',
                        'has_lang_data'=>true,
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Второй номер телефона в контактах',
                'name_key' => 'second_num_contact',
                'data' =>
                    [
                        'data'=>'+8 800 555 35 35',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Email в контактах',
                'name_key' => 'first_email_contact',
                'data' =>
                    [
                        'data'=>'artpoint2004@gmail.com',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('emails'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Второй email в контактах',
                'name_key' => 'second_email_contact',
                'data' =>
                    [
                        'data'=>'titar.yura@gmail.com',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('emails'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Instagram',
                'name_key' => 'instagram',
                'data' =>
                    [
                        'data'=>'https://www.instagram.com',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('social'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Facebook',
                'name_key' => 'facebook',
                'data' =>
                    [
                        'data'=>'https://www.facebook.com/',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('social'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Youtube',
                'name_key' => 'youtube',
                'data' =>
                    [
                        'data'=>'https://www.youtube.com/',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('social'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Telegram',
                'name_key' => 'telegram',
                'data' =>
                    [
                        'data'=>'https://web.telegram.org',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('social'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Почта для обратной связи',
                'name_key' => 'feedback',
                'data' =>
                    [
                        'data'=>'mail@gmail.com',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('emails'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ]

        ];
        $settingsRepository = new \App\Repository\SettingsRepository(app());
        foreach ($data as $item) {
            $settingsRepository->setSettings($item['data'], $item['name_key'], $item['type'], $item['group'], $item['name']);
//            $settingsRepository->create(['data'=>$item['data']]);
//            (new \App\Models\Settings\Setting(['data'=>$item['data']]))
//                ->setSetting($item['type'],$item['group'],$item['name_key'],$item['name'])->save();
        }

    }
}
