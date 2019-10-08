<?php

namespace App\Models;



use App\Contracts\HasImageContract;
use App\Contracts\HasLangData;
use App\Scopes\SortScope;
use App\Traits\ImageTrait;
use App\Traits\LangDataTrait;

class Partner extends Model implements HasLangData,HasImageContract
{
    use LangDataTrait;
    use ImageTrait;
    protected $table = 'partners';
    protected $fillable = ['link','active'];
    private $langClass = '';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SortScope);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setLangClass(PartnerLang::class);
    }

    function setLangClass(string $className)
    {
      $this->langClass=$className;
    }

    function getLangClass(): string
    {
        return $this->langClass;
    }
}
