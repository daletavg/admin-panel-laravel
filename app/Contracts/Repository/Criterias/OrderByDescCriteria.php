<?php


namespace App\Contracts\Repository\Criterias;


use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class OrderByDescCriteria implements CriteriaInterface
{

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->orderBy('created_at','desc');
        return $model;
    }
}
