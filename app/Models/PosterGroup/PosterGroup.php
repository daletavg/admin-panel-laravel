<?php

namespace App\Models\PosterGroup;



use App\Contracts\HasLangData;
use App\Models\Model;
use App\Models\Poster\Poster;
use App\Traits\LangDataTrait;

class PosterGroup extends Model implements HasLangData
{
    use LangDataTrait;
    protected $table = 'poster_group';
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

    public function poster()
    {
        return $this->hasMany(Poster::class,'poster_group_id','id');
    }

    public function posterWithData()
    {
        return $this->hasMany(Poster::class,'poster_group_id','id')->with('lang','city.lang','place.lang');
    }
}
