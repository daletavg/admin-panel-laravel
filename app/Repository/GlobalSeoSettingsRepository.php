<?php


namespace App\Repository;


use App\Models\GlobalSeoSetting;
use App\Models\Redirect;
use Prettus\Repository\Eloquent\BaseRepository;

class GlobalSeoSettingsRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GlobalSeoSetting::class;
    }



}
