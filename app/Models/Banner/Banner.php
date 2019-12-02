<?php

namespace App\Models\Banner;

use App\Contracts\HasImageContract;
use App\Contracts\HasLangData;
use App\Traits\ImageTrait;
use App\Traits\Models\HasLangDataTrait;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model implements HasLangData, HasImageContract
{
    use HasLangDataTrait;
    use ImageTrait;


    protected $table = 'banners';
    protected $fillable = ['sort'];

    function getLangClass(): string
    {
        return BannerLang::class;
    }


}
