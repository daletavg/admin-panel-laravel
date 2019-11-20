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

    public function active(bool $active = true)
    {
        return $this->model->where('active',$active);
    }
    public function onGeneral(bool $active = true)
    {
        return $this->active($active)->where('on_general',true)->with('lang','images','city.lang','place.lang');
    }

    public function newPosters(bool $active =true)
    {
        return $this->active($active)->where('date','>=',(new \DateTime())->format('Y-m-d H:i:s'))->with('lang','images','city.lang','place.lang');
    }

    public function history(bool $active = true)
    {
        return $this->active($active)->where('date','<',(new \DateTime())->format('Y-m-d H:i:s'))->with('lang','images','city.lang','place.lang');
    }

    public function findByUrl(string $url,bool $active = true)
    {
        return $this->active($active)->where('url',$url)
            ->with('lang','images','city.lang','place.lang','manyImages.images','group.posterWithData')->first();
    }

    public function paginateHistoryWithData(int $limit)
    {
        return $this->model->where('date','<',(new \DateTime())->format('Y-m-d H:i:s'))->with('lang','city.lang','images')->paginate($limit);
    }

    public function paginateWithData(int $limit)
    {
        return $this->model->with('lang','city.lang','images')->paginate($limit);
    }

    public function search(string  $search,bool $active = null,$limit=15){

        $data = null;
        if($active !== null){
            $data = $this->active($active)->whereHas('lang', function ($query) use( $search) {
                $query->where('title', 'like','%'.$search.'%');
            })->with('lang','city.lang','images');
            if($limit !== null)
            {
                $data = $data->paginate($limit);
            }
            return $data;
        }



        $data = $this->model->whereHas('lang', function ($query) use( $search) {
            $query->where('title', 'like','%'.$search.'%');
        })->with('lang','city.lang','images')->paginate($limit);



        return $data;
//        return $model->where('title','like','%'.$search.'%')->with()
    }
    public function searchHistory(string  $search, int $limit=15){

        return $this->model->where('date','<',(new \DateTime())->format('Y-m-d H:i:s'))->whereHas('lang', function ($query) use( $search) {
            $query->where('title', 'like','%'.$search.'%');
        })->with('lang','city.lang','images')->paginate($limit);
//        return $model->where('title','like','%'.$search.'%')->with()
    }
}
