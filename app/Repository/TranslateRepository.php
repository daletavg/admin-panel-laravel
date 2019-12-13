<?php


namespace App\Repository;

use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Translate\TranslateLang;
use App\Traits\Repository\SaveLangDataTrait;
use Illuminate\Support\Facades\Cache;
use App\Models\Translate\Translate;
use Prettus\Repository\Eloquent\BaseRepository;

class TranslateRepository extends BaseRepository implements SaveLangDataContract
{
    use SaveLangDataTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Translate::class;
    }

    public function langModel()
    {
        return TranslateLang::class;
    }


    public function whereGroupWithLang( string $group)
    {

        return $this->model->where('group',$group)->with('lang')->get();
    }


    public function addTranslate(Translate $translate)
    {
        $key =getTranslateKey($translate);
        if(!Cache::has($key)) {
            $translate->load('langs');
            Cache::forever(getTranslateKey($translate), $translate);
        }
    }

    public function removeTranslate(Translate $translate)
    {
        $key =getTranslateKey($translate);
        if(Cache::has($key)) {
            Cache::forget($key);
        }
    }

    public function updateTranslate(string $oldKey, Translate $translate)
    {
        if(Cache::has($oldKey)) {
            Cache::forget($oldKey);
        }
        self::addTranslate($translate);
    }

    public function getTranslateByKey(string $key)
    {
        $translate = null;
        if(Cache::has($key)) {
           $translate = Cache::get($key);
        }
        else{
            $keyAndGroup = explode('.',$key);
            $translate = Translate::where([['key',$keyAndGroup[0]],['group',$keyAndGroup[1]]])->first();
            if($translate !== null)
            {
                $translate->load('langs');
                self::addTranslate($translate);
            }
        }
        return $translate;
    }


}
