<?php

namespace App\Models\City;



use App\Contracts\LangDataContract;
use App\Models\Model;
use App\Traits\LanguageTrait;

class CityLang extends Model implements LangDataContract
{
    use LanguageTrait;
    protected $table = 'city_lang';
    protected $fillable = ['title'];
    public $timestamps=false;
}
