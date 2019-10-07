<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
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
                'uk'=>['title'=>'Одеса'],
                'en'=>['title'=>'Odesa'],
                'ru'=>['title'=>'Одесса']
            ],
            [
                'uk'=>['title'=>'Миколаїв'],
                'en'=>['title'=>'Nikolaev'],
                'ru'=>['title'=>'Николаев']
            ]
        ];
        foreach ($data as $item) {
            $city = new \App\Models\City();
            $city->save();
            foreach ($item as $key => $langData) {
                $langData+= ['language_id'=>\App\Models\Language::getLangIdByKey($key)];

                $lang = (new \App\Models\CityLang())->fill($langData);

                $city->lang($key)->save($lang);
            }
        }
    }
}
