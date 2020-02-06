<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate {url?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //todo change this
        $url = $this->argument('url') ?? env('APP_URL');
        // modify this to your own needs
        SitemapGenerator::create($url)->hasCrawled(function (Url $url) {
            if ($url->segment(1) === 'about') {
                $url->setPriority(0.8)->setChangeFrequency(URL::CHANGE_FREQUENCY_YEARLY);
            }
            elseif ($url->segment(1) === 'news') {
                $url->setPriority(0.9)->setChangeFrequency(URL::CHANGE_FREQUENCY_WEEKLY);
            }
            elseif ($url->segment(1) === 'about-developer') {
                $url->setPriority(0.8)->setChangeFrequency(URL::CHANGE_FREQUENCY_YEARLY);
            }
            elseif ($url->segment(1) === 'progress') {
                $url->setPriority(0.9)->setChangeFrequency(URL::CHANGE_FREQUENCY_DAILY);
            }
            elseif ($url->segment(1) === 'flat') {
                $url->setPriority(0.9)->setChangeFrequency(URL::CHANGE_FREQUENCY_MONTHLY);
            }
            elseif ($url->segment(1) === 'gallery') {
                $url->setPriority(0.8)->setChangeFrequency(URL::CHANGE_FREQUENCY_WEEKLY);
            }
            return $url;
        })
            ->writeToFile(public_path('sitemap.xml'));
    }
}
