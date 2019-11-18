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
        foreach(range(1,15) as $i)
        {
            $this->createPosters();
        }
    }

    private function createPosters()
    {
        $poster = $this->postersRepository->create([
            'price_before'=>1,
            'price_to'=>2,
        ]);
        $radomDescription = \Illuminate\Support\Str::random(500);
        $data=[
            'ru' => [
                'title' => \Illuminate\Support\Str::random(10),
                'description'=>$radomDescription,
                'short_description'=>$radomDescription
            ],
            'uk' => [
                'title' => \Illuminate\Support\Str::random(10),
                'description'=>$radomDescription,
                'short_description'=>$radomDescription
            ],
            'en' => [
                'title' => \Illuminate\Support\Str::random(10),
                'description'=>$radomDescription,
                'short_description'=>$radomDescription
            ],
        ];
        $this->postersRepository->createLangData($poster->id, $data);
    }
}
