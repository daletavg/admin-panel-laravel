<?php

namespace App\Models\Meta;

use App\Contracts\HasLangData;
use App\Models\Model;
use App\Traits\LangDataTrait;
use App\Traits\Singleton;
use Illuminate\Support\Arr;


class Meta extends Model implements HasLangData
{
    use LangDataTrait;
    use Singleton;

    private $langClass = '';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setLangClass(MetaLang::class);
    }

    public function setLangClass(string $className)
    {
        $this->langClass = $className;
    }

    public function getLangClass(): string
    {
        return $this->langClass;
    }

    protected $hasOneLangArguments = [MetaLang::class];

    public const ONLY_ONE_PAGE_TYPE = 0;
    public const DEFAULT_TYPE = 1;


    protected $table = 'meta';

    protected $guarded = ['id'];

    protected $fillable = ['url', 'type', 'active'];

    public static function getMetaData($url = null, $fromCache = true)
    {
        if ($url === null) {
            $url = getUrlWithoutHost(getNonLocaledUrl());
        }

        if (($meta = static::WhereUrl($url)->Active(true)->with('lang')->first()) !== null) {

            $meta = self::DefaultMeta();
        }


        return $meta;
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
