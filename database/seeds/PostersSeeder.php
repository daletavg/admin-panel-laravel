<?php

use Illuminate\Database\Seeder;

class PostersSeeder extends Seeder
{
    protected $postersRepository;

    public function __construct()
    {
        $this->postersRepository = new \App\Repository\PostersRepository(app());
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $interval = new DateInterval('P3M');
//        $date = new DateTime();
//        dump($date);
//        dd($date->sub($interval));
        foreach (range(1, 30) as $i) {
            $this->createPosters();
        }
        foreach (range(1, 30) as $i) {
            $this->createPosters(false);
        }
    }

    private function createPosters(bool $isNew = true)
    {

        $interval = new DateInterval('P3M');


        $poster = $this->postersRepository->create([
            'price_before' => 1,
            'price_to' => 2,
            'active'=>true,
            'url'=>\Illuminate\Support\Str::random(15),
            'date' => $isNew?(new DateTime())->add($interval)->format('Y-m-d H:i:s'):(new DateTime())->sub($interval)->format('Y-m-d H:i:s')
        ]);
        $radomDescription = \Illuminate\Support\Str::random(500);
        $data = [
            'ru' => [
                'title' => \Illuminate\Support\Str::random(10),
                'description' => $radomDescription,
                'short_description' => $radomDescription
            ],
            'uk' => [
                'title' => \Illuminate\Support\Str::random(10),
                'description' => $radomDescription,
                'short_description' => $radomDescription
            ],
            'en' => [
                'title' => \Illuminate\Support\Str::random(10),
                'description' => $radomDescription,
                'short_description' => $radomDescription
            ],
        ];
        $this->postersRepository->createLangData($poster->id, $data);
    }
}
