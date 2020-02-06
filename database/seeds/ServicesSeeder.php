<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicesRepository = new \App\Repository\ServicesRepository(app());
        $servicesRepository->create(['title'=>'Межевание','url'=>'land-surveying']);
        $servicesRepository->create(['title'=>'Технический план','url'=>'technical-plan']);
        $servicesRepository->create(['title'=>'Техническая инвентаризация','url'=>'technical-inventory']);
    }
}
