<?php

namespace App\Models;


use App\Traits\LanguageTrait;

class PartnerLang extends Model
{
    use LanguageTrait;

    protected $table = 'partner_lang';
    protected $fillable = ['title'];
    public $timestamps=false;
}
