<?php


namespace App\Repository;


use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Service\Service;
use App\Models\Service\ServiceLang;
use App\Traits\Repository\SaveLangDataTrait;
use Prettus\Repository\Eloquent\BaseRepository;

class ServicesRepository extends BaseRepository implements SaveLangDataContract
{
    use SaveLangDataTrait;

    public function model()
    {
        return Service::class;
    }

    function langModel()
    {
        return ServiceLang::class;
    }


}
