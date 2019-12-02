<?php

namespace App\Models\Meta;

use App\Contracts\HasLangData;
use App\Models\Model;
use App\Traits\Models\HasLangDataTrait;
use App\Traits\Singleton;
use Illuminate\Support\Arr;


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
