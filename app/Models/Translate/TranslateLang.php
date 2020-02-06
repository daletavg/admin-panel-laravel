<?php

namespace App\Models\Translate;



use App\Contracts\LangDataContract;
use App\Models\Model;
use App\Traits\LanguageTrait;

/**
 * App\Models\Translate\TranslateLang
 *
 * @property int $id
 * @property int $translate_id
 * @property string|null $data
 * @property int $language_id
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\TranslateLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\TranslateLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\TranslateLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\TranslateLang whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\TranslateLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\TranslateLang whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\TranslateLang whereTranslateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class TranslateLang extends Model implements LangDataContract
{
    use LanguageTrait;

    protected $table = 'translate_lang';
    protected $fillable = ['data'];
    public $timestamps = false;
}
