<?php

namespace App\Models\Settings;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Settings\SettingLang
 *
 * @property int $id
 * @property int $setting_id
 * @property string|null $data
 * @property int $language_id
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\SettingLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\SettingLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\SettingLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\SettingLang whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\SettingLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\SettingLang whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\SettingLang whereSettingId($value)
 * @mixin \Eloquent
 */
class SettingLang extends Model
{
    use LanguageTrait;
    protected $table= 'setting_lang';
    public $timestamps = false;
    protected $fillable = ['data'];
}
