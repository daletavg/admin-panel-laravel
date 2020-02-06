<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function run()
    {
        $clientsRepository = new \App\Repository\ClientsRepository(app());
        foreach(range(1,10) as $i){
            $data = [
                'title'=>\Illuminate\Support\Str::random(5),
                'active'=>true
            ];
            $clientsRepository->create($data);
        }
    }
}
