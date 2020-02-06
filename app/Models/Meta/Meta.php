<?php

namespace App\Models\Meta;

use App\Contracts\HasLangData;
use App\Models\Model;
use App\Traits\Models\HasLangDataTrait;
use App\Traits\Singleton;
use Illuminate\Support\Arr;


/**
 * App\Models\Meta\Meta
 *
 * @property int $id
 * @property string $url
 * @property int $type
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta\MetaLang[] $langs
 * @property-read int|null $langs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta metaWithoutDefault()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta\Meta whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class Meta extends Model implements HasLangData
{
    use HasLangDataTrait;
    public const ONLY_ONE_PAGE_TYPE = 0;
    public const DEFAULT_TYPE = 1;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

    }


    protected $table = 'meta';

    protected $guarded = ['id'];

    protected $fillable = ['url', 'type', 'active'];

    function getLangClass(): string
    {
        return MetaLang::class;
    }


    public function isDefault()
    {
        return $this->url === '*';
    }

    static function DefaultMeta()
    {
        return self::where('type', self::DEFAULT_TYPE)->with('langs')->first();
    }

    public function scopeWhereUrl($query, $url)
    {
        return $query->where('url', '=', $url);
    }

    public function scopeMetaWithoutDefault($query)
    {
        return $query->where([['url', '!=', '*'], ['type', '!=', self::DEFAULT_TYPE]]);
    }
}
