<?php

use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,10) as $i){
            $this->createPartner();
        }
    }

    private function createPartner()
    {
        $partner = new \App\Models\Partner\Partner([
            'active'=>true,
        ]);
        $partner->save();
        $data = [
            'ru'=>[
                'title'=>\Illuminate\Support\Str::random(10)
            ],
            'uk'=>[
                'title'=>\Illuminate\Support\Str::random(10)
            ],
            'en'=>[
                'title'=>\Illuminate\Support\Str::random(10)
            ],
        ];
        $partner->saveLang($data);
    }
}
