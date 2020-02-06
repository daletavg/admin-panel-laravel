<?php

use Illuminate\Database\Seeder;

class TypeSettingsSeeder extends Seeder
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
                'name' => 'input',
                'type'=>'input'
            ],
            [
                'name' => 'textaria',
                'type'=>'textaria'
            ],
            [
                'name' => 'CKEditor',
                'type'=>'ckeditor'
            ],
            [
                'name' => 'label',
                'type'=>'label'
            ],
        ];
        foreach ($data as $item)
        {
            (new \App\Models\Settings\TypeSetting())->fill($item)->save();
        }
    }
}
