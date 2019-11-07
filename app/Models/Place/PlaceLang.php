<?php

namespace App\Models\Place;



use App\Contracts\LangDataContract;
use App\Models\Model;
use App\Traits\LanguageTrait;

class PlaceLang extends Model implements LangDataContract
{
    use LanguageTrait;
    protected $table = 'place_lang';
    protected $fillable = ['title'];
    public $timestamps = false;

}
