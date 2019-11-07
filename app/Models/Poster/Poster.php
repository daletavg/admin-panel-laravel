<?php

namespace App\Models\Poster;

use App\Contracts\HasImageContract;
use App\Contracts\HasLangData;
use App\Contracts\HasManyImagesContract;
use App\Models\City\City;
use App\Models\Model;
use App\Models\Place\Place;
use App\Models\PosterGroup\PosterGroup;
use App\Traits\ImageTrait;
use App\Traits\LangDataTrait;
use App\Traits\ManyImagesTarit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Poster extends Model implements HasLangData,HasImageContract,HasManyImagesContract
{
    use LangDataTrait;
    use ManyImagesTarit;
    use ImageTrait;
    protected $table = 'posters';
    protected $fillable = ['date','pay_link','video','price_before','price_to','active','on_general','color'];
    private $langClass = '';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setLangClass(PosterLang::class);
    }

    function setLangClass(string $className)
    {
        $this->langClass=$className;
    }

    function getLangClass(): string
    {
        return $this->langClass;
    }

    public function city():BelongsTo
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function place():BelongsTo
    {
        return $this->belongsTo(Place::class,'place_id','id');
    }
    public function group():BelongsTo
    {
        return $this->belongsTo(PosterGroup::class,'poster_group_id','id');
    }


}
