<?php

namespace App\Models\Banner;

use App\Contracts\LangDataContract;
use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class BannerLang extends Model implements LangDataContract
{
    use LanguageTrait;
    protected $table ='banner_lang';
    protected $fillable = ['title','description'];
    public $timestamps = false;
}
