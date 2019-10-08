<?php


namespace App\Repository;


use App\Models\Language;
use Illuminate\Support\Facades\Cache;

class LanguageRepository
{
    static function getLanguage()
    {
        $data = null;

        if(!Cache::has('allLanguages'))
        {
            $data = Language::where('power',true)->get();
            Cache::forever('allLanguages',$data);
        }
        return Cache::get('allLanguages');
        //Cache::add('language',)

    }
}
