<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rep = new \App\Repository\NewsRepository(app());
        foreach (range(1,10) as $i){
            $data = now();
            if($i%2){
                $data = $data->subHours(rand(0,40));
            }else{
                $data = $data->addHours(rand(0,40));
            }
            $rep->create([
                'title'=>\Illuminate\Support\Str::random(10),
                'description'=>\Illuminate\Support\Str::random(10),
                'date'=> $data,
                'active'=>true,
                'url'=>\Illuminate\Support\Str::random(10)
            ]);
        }
    }
}
