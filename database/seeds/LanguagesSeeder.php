<?php

use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
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
              'name'=>'Русский',
              'locale'=>'ru',
              'active'=>true
          ],
            [
                'name'=>'Українська',
                'locale'=>'uk',
                'active'=>false
            ],
            [
                'name'=>'English',
                'locale'=>'en',
                'active'=>false
            ]

        ];

        foreach ($data as $item){
            (new \App\Models\Language())->fill($item)->save();
        }
    }
}
