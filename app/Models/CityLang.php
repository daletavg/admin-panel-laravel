<?php

namespace App\Models;



use App\Traits\LanguageTrait;

class CityLang extends Model
{
    use LanguageTrait;
    protected $table = 'city_lang';
    protected $fillable = ['title'];
    public $timestamps=false;
}
