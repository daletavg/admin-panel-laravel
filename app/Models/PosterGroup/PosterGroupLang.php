<?php

namespace App\Models\PosterGroup;

use App\Contracts\LangDataContract;
use App\Models\Model;
use App\Traits\LanguageTrait;


class PosterGroupLang extends Model implements LangDataContract
{
    use LanguageTrait;
    protected $table = 'poster_group_lang';
    protected $fillable = ['title'];
    public $timestamps =false;

}
