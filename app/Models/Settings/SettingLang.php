<?php

namespace App\Models\Settings;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class SettingLang extends Model
{
    use LanguageTrait;
    protected $table= 'setting_lang';
    public $timestamps = false;
    protected $fillable = ['data'];
}
