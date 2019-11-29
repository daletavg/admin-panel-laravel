<?php

namespace App\Models;


class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['locale', 'name', 'active'];
    public $timestamps = false;


    public static function getLangIdByKey(string $locale)
    {
        return Language::where('locale',$locale)->first()->id;
    }
    public static function getLanguageByKey(string $locale)
    {
        return Language::where('locale',$locale)->first();
    }
}
