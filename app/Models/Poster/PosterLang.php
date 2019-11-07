<?php

namespace App\Models\Poster;

use App\Contracts\LangDataContract;
use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class PosterLang extends Model implements LangDataContract
{
    use LanguageTrait;

    protected $table = 'poster_lang';
    protected $fillable = ['title','description','short_description'];
    public $timestamps = false;
}
