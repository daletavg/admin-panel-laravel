<?php

namespace App\Repositories;


use App\Contracts\Repository\CacheContract;
use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Meta\Meta;
use App\Models\Meta\MetaLang;
use App\Traits\Repository\SaveLangDataTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;


//use Your Model

/**
 * Class MetaRepository.
 */
class MetaRepository extends BaseRepository implements SaveLangDataContract, CacheContract
{
    use SaveLangDataTrait;
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Meta::class;
    }

    function langModel()
    {
        return MetaLang::class;
    }

    public function findByUrl($url)
    {
        return $this->model->whereUrl($url)->first();
    }

    public function metaWithLang()
    {
       return $this->model->where([['url','!=','*'],['type','!=',Meta::DEFAULT_TYPE]])->with('lang');
    }

    public function getDefaultMeta()
    {
        if (Cache::has('*')) {
            return Cache::get('*');
        }
        else{
            $data = $this->model->where([['url','=','*'],['type','=',Meta::DEFAULT_TYPE]])->with('langs')->first();
            if($data !== null) {
                $this->addCache($data);
            }
            return $data;
        }
    }

    public function getMetaData(string $url = null)
    {
        if ($url === null) {
            $url = getUrlWithoutHost(getNonLocaledUrl());
        }
        $meta = null;

        if(Cache::has($url)){
            $meta = Cache::get($url);
        }
        else {
            $meta = $this->model->WhereUrl($url)->Active(true)->with('langs')->first();

        }
        if ($meta === null) {
            $meta = $this->getDefaultMeta();
        }
        return $meta;
    }

    /**
     * @param Meta $data
     * @return mixed
     */
    public function addCache($data)
    {
        $key = $data->url;
        if($key!= null && !Cache::has($key)) {
            $data->load('langs');
            Cache::forever($key, $data);
        }
        return Cache::get($key);
    }
    /**
     * @param Meta $data
     * @return mixed
     */
    public function removeCache($data)
    {
        $key =$data->url;
        if($key!= null && Cache::has($key)) {
            Cache::forget($key);
        }
    }
    /**
     * @param string $oldKey
     * @param Meta $data
     * @return mixed
     */
    public function updateCache(string $oldKey, $data)
    {
        if(Cache::has($oldKey)) {
            Cache::forget($oldKey);
        }
        $this->addCache($data);
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getCacheByKey(string $key)
    {
        $data = null;
        if(Cache::has($key)) {
            $data = Cache::get($key);
        }
        else{

            $data =  $this->findByUrl($key);
            if($data !== null )
            {
                $data->load('langs');
                self::addCache($data);
            }
        }
        return $data;
    }
}
