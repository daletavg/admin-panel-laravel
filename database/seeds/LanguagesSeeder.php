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
              'power'=>true
          ],
            [
                'name'=>'Українська',
                'locale'=>'uk',
                'power'=>true
            ],
            [
                'name'=>'English',
                'locale'=>'en',
                'power'=>true
            ]

        ];

        foreach ($data as $item){
            (new \App\Models\Language())->fill($item)->save();
        }
    }
}
