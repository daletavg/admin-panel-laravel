<?php

use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRepository = new \App\Repository\BannersRepository(app());
        foreach(range(1,10) as $i){
            $data = [
                'title'=>\Illuminate\Support\Str::random(5),
                'description'=>\Illuminate\Support\Str::random(5),
                'active'=>true
            ];
            $bannerRepository->create($data);
        }
    }
}
