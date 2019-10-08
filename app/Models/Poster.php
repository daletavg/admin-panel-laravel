<?php

namespace App\Models;

use App\Contracts\HasImageContract;
use App\Contracts\HasLangData;
use App\Contracts\HasManyImagesContract;
use App\Traits\ImageTrait;
use App\Traits\LangDataTrait;
use App\Traits\ManyImagesTarit;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Poster extends Model implements HasLangData,HasImageContract,HasManyImagesContract
{
    use LangDataTrait;
    use ManyImagesTarit;
    use ImageTrait;
    protected $table = 'posters';
    protected $fillable = ['date','pay_link','video','price_before','price_to','active','on_general'];
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


}
