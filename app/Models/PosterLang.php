<?php

namespace App\Models;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class PosterLang extends Model
{
    use LanguageTrait;

    protected $table = 'poster_lang';
    protected $fillable = ['title','description','short_description'];
    public $timestamps = false;
}
