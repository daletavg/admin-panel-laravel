<?php

namespace App\Models;

use App\Contracts\HasLangData;
use App\Traits\LangDataTrait;


class Place extends Model implements HasLangData
{
    use LangDataTrait;
    protected $table = 'places';
    private $langClass = '';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setLangClass(PlaceLang::class);
    }

    function setLangClass(string $className)
    {
        $this->langClass = $className;
    }

    function getLangClass(): string
    {
       return $this->langClass;
    }
}
