<?php


namespace App\Repository;


use App\Contracts\Repository\SaveImageContract;
use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Banner\Banner;
use App\Models\Banner\BannerLang;
use App\Traits\Repository\SaveImageTrait;
use App\Traits\Repository\SaveLangDataTrait;
use Prettus\Repository\Eloquent\BaseRepository;

class BannersRepository extends BaseRepository implements SaveLangDataContract,SaveImageContract
{
    use SaveLangDataTrait;
    use SaveImageTrait;
    public function model()
    {
       return Banner::class;
    }

    function langModel()
    {
        return BannerLang::class;
    }
}
