<?php

namespace App\Models\Meta;


use App\Contracts\LangDataContract;
use App\Models\Model;
use App\Traits\EloquentMultipleForeignKeyUpdate;
use App\Traits\LanguageTrait;
use App\Traits\Models\BelongsToLanguage;

/**
 * App\Models\Meta\MetaLang
 *
 * @property int $id
 * @property int $meta_id
 * @property string|null $h1
 * @property string|null $title
 * @property string|null $keywords
 * @property string|null $description
 * @property string|null $header html/js etc code for header
 * @property string|null $footer html/js etc code for footer
 * @property string|null $text_top
 * @property string|null $text_bottom
 * @property int $language_id
 * @property-read \App\Models\Language $language
 * @property-read \App\Models\Meta\Meta $meta
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereMetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereTextBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereTextTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\MetaLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class MetaLang extends Model implements LangDataContract
{
    use LanguageTrait;
    protected $table = 'meta_lang';


    protected $fillable = ['h1','title','keywords','description','header','footer','text_top','text_bottom'];

    public $incrementing = false;


    public $timestamps = false;

    public function meta(){
        return $this->belongsTo(Meta::class);
    }

}
