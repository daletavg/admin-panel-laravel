<?php

namespace App\Models;


/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $locale
 * @property string $name
 * @property int $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['locale', 'name', 'active'];
    public $timestamps = false;


    public static function getLangIdByKey(string $locale)
    {
        return Language::where('locale',$locale)->first()->id;
    }
    public static function getLanguageByKey(string $locale)
    {
        return Language::where('locale',$locale)->first();
    }
}
