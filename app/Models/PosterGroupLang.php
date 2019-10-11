<?php

namespace App\Models;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class PosterGroupLang extends Model
{
    use LanguageTrait;
    protected $table = 'poster_group_lang';
    protected $fillable = ['title'];
    public $timestamps =false;

}
