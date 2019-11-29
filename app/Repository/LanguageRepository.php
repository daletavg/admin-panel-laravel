<?php


namespace App\Repository;


use App\Models\Language;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;

class LanguageRepository extends BaseRepository
{
    public function model()
    {
        return Language::class;
    }

    static public function updateLanguagesCache()
    {
        $data = Language::where('active',true)->get();
        Cache::forever('allLanguages',$data);
    }

    static function isLanguageActive(string $locale):bool
    {
        $data = self::getLanguage();
        if($data->where('locale',$locale)->first()!==null){
            return true;
        }
        return false;
    }

    static function getLanguage()
    {
        $data = null;

        if(!Cache::has('allLanguages'))
        {
            self::updateLanguagesCache();
        }
        return Cache::get('allLanguages');

    }

    static function getAllLocales()
    {
        $data = null;

        if(!Cache::has('allLocales'))
        {
            $data = Language::where('active',true)->get('locale');
            Cache::forever('allLocales',$data);
        }
        return Cache::get('allLocales');

    }

    static function getLanguageByKey($key)
    {
        $data = self::getAllLocales();
        return $data->where('locale',$key)->first();
    }

    static function getLocaleById(int $localeId)
    {
        $data = null;

        if(!Cache::has('getLocaleById['.$localeId.']'))
        {
            $data = Language::where([['active',true],['id',$localeId]])->first()->locale;
            Cache::forever('getLocaleById['.$localeId.']',$data);
        }
        return Cache::get('getLocaleById['.$localeId.']');
    }

    static function getLocaleIdByLocale($locale):int
    {
        $lang = self::getLanguage();
        $lang = $lang->where('locale',$locale);
        $lang=Arr::first($lang);

        return $lang->id??1;
    }

    static function getCurrentLocaleId()
    {
        $lang = self::getLanguage();

        $lang = $lang->where('locale',getCurrentLocale());
        $lang=Arr::first($lang);

        return $lang->id??1;
    }

    static function getCountLanguages()
    {
        return count(self::getLanguage());
    }


}
