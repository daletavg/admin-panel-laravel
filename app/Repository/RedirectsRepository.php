<?php


namespace App\Repository;


use App\Models\Redirect;
use Prettus\Repository\Eloquent\BaseRepository;

class RedirectsRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Redirect::class;
    }

    public function findByUrl($url)
    {
        return $this->model->where('from','=',$url)->first();
    }

}
