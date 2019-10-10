<?php

namespace App\Models;


use App\Contracts\HasLangData;
use App\Traits\LangDataTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model implements HasLangData
{
    use LangDataTrait;
    protected $table = 'cities';
    private $langClass = '';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setLangClass(CityLang::class);
    }

    public function place():HasMany
    {
        return $this->hasMany(Place::class,'city_id','id');
    }

    public function setLangClass(string $className)
    {
        $this->langClass = $className;
    }
    public function getLangClass(): string
    {
        return $this->langClass;
    }

    public function posters():HasMany
    {
        return $this->hasMany(Poster::class,'city_id','id');
    }

    static function getCities():array
    {
        $data = [];
        foreach (City::with('lang')->get()->toArray() as $item)
        {
            array_push($data,['id'=>$item['id'], 'value'=>$item['lang']['title']]);
        }

        return $data;
    }

}
