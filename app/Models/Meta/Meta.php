<?php

namespace App\Models;

use App\Contracts\HasLangData;
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

    protected static $results = [];

    protected $table = 'meta';

    protected $guarded = ['id'];

    protected $fillable = ['url','type','power'];

    public static function getMetaData($url = null, $fromCache = true)
    {
        if ($url === null) {
            $url = getUrlWithoutHost(getNonLocaledUrl());
        }
        if (!Arr::has(static::$results, $url) OR !$fromCache) {
            $meta = static::WhereUrl($url)->Active(true)->lang()->first();
            Arr::set(static::$results, $url, $meta);
        }

         return Arr::get(static::$results, $url);
    }

    public function isDefault()
    {
        return $this->url === '*';
    }

    public function scopeWhereUrl($query, $url)
    {
        return $query->where('url', '=', $url);
    }
}
