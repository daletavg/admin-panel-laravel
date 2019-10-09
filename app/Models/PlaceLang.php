<?php

namespace App\Models;



use App\Traits\LanguageTrait;

class PlaceLang extends Model
{
    use LanguageTrait;
    protected $table = 'place_lang';
    protected $fillable = ['title'];
    public $timestamps = false;

}
