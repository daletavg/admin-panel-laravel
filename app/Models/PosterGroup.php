<?php

namespace App\Models;



use App\Contracts\HasLangData;
use App\Traits\LangDataTrait;

class PosterGroup extends Model implements HasLangData
{
    use LangDataTrait;
    protected $table = 'poster_lang';
    private $langClass ='';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setLangClass(PosterGroupLang::class);
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
