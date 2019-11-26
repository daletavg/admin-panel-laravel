<?php

namespace App\Models\Translate;



use App\Contracts\LangDataContract;
use App\Models\Model;
use App\Traits\LanguageTrait;

class TranslateLang extends Model implements LangDataContract
{
    use LanguageTrait;

    protected $table = 'translate_lang';
    protected $fillable = ['data'];
    public $timestamps = false;
}
