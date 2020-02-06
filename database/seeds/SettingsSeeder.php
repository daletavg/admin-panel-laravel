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
                'name' => 'Первый номер',
                'name_key' => 'phone_first',
                'data' =>[
                    'data'=>'+8 (965) 763 07 05',
                ],
                'group' => \App\Models\Settings\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Второй номер',
                'name_key' => 'phone_second',
                'data' =>[
                    'data'=>'+8 (965) 763 07 05',
                ],
                'group' => \App\Models\Settings\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Адрес',
                'name_key' => 'address',
                'data' =>[
                    'data'=>'г. Санкт-Петербург, ул. Пушкинская 123, офис 12',
                ],
                'group' => \App\Models\Settings\GroupSetting::getGroup('contacts'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Email в контактах',
                'name_key' => 'email',
                'data' =>
                    [
                        'data'=>'eckr-manager@gmail.com',
                    ] ,
                'group' => \App\Models\Settings\GroupSetting::getGroup('emails'),
                'type' => \App\Models\Settings\TypeSetting::getType('input'),
            ],
            [
                'name' => 'Email обратной связи',
                'name_key' => 'feedback',
                'data' =>
                    [
                        'data'=>'mail@gmail.com',
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

        ];
        $settingsRepository = new \App\Repository\SettingsRepository(app());
        foreach ($data as $item) {
            $settingsRepository->setSettings($item['data'], $item['name_key'], $item['type'], $item['group'], $item['name']);
        }

    }
}
