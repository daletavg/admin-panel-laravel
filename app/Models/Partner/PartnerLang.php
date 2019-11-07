<?php

namespace App\Models\Partner;


use App\Contracts\LangDataContract;
use App\Models\Model;
use App\Traits\LanguageTrait;

class PartnerLang extends Model implements LangDataContract
{
    use LanguageTrait;

    protected $table = 'partner_lang';
    protected $fillable = ['title'];
    public $timestamps=false;
}
