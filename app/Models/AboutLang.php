<?php

namespace App\Models;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class AboutLang extends Model
{
    use LanguageTrait;
    protected $table = 'about_lang';
    protected $fillable = ['description'];
    public $timestamps=false;
}
