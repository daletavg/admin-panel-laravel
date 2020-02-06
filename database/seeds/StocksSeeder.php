<?php

use Illuminate\Database\Seeder;

class StocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function run()
    {
        $stocksRepository = new \App\Repository\StocksRepository(app());
        foreach (range(1,10) as $i){
            $data = [
                'title'=>\Illuminate\Support\Str::random(5),
                'description'=>\Illuminate\Support\Str::random(5),
                'new_price'=>random_int(1,10),
                'old_price'=>random_int(20,30),
                'active'=>true
            ];
            $stocksRepository->create($data);
        }
    }
}
