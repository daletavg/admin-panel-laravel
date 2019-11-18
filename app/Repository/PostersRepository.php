<?php


namespace App\Repository;


use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Poster\Poster;
use App\Models\Poster\PosterLang;
use App\Models\Translate\TranslateLang;
use App\Traits\Repository\SaveLangDataTrait;
use Prettus\Repository\Eloquent\BaseRepository;

class PostersRepository extends BaseRepository implements SaveLangDataContract
{
    use SaveLangDataTrait;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Poster::class;
    }
    public function langModel()
    {
        return PosterLang::class;
    }

    public function active($active = true)
    {
        return $this->model->where('active',true);
    }
    public function onGeneral()
    {
        return $this->active()->where('on_general',true)->with('lang','images','city.lang','place.lang');
    }
}
