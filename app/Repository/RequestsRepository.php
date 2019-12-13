<?php


namespace App\Repository;


use App\Models\Request;
use Prettus\Repository\Eloquent\BaseRepository;

class RequestsRepository extends BaseRepository
{
    public function model()
    {
        return Request::class;
    }


}
