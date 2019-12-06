<?php


namespace App\Repository;


use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Settings\GroupSetting;
use App\Models\Settings\Setting;
use App\Models\Settings\SettingLang;
use App\Models\Settings\TypeSetting;
use App\Traits\Repository\SaveLangDataTrait;
use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Eloquent\BaseRepository;

class SettingsRepository extends BaseRepository implements SaveLangDataContract
{
    use SaveLangDataTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Setting::class;
    }


    function langModel()
    {
        return SettingLang::class;
    }

    /**
     * @param string $key
     * @return Setting
     */
    public function findByKey(string $key)
    {
        return $this->model->where('name_key',$key)->first();
    }

    public function updateLangSetting(int $id,array $data)
    {
        $setting  = $this->find($id);
        if(($lang = $setting->lang) !==null){
            $this->updateLang($setting->id,$data);
        }else{
            $this->createLangData($setting->id,$data);
        }
    }

    public  function findBySettingKey(string $key):?Setting
    {

        $data = explode('.',$key);
        $group = GroupSetting::getGroup($data[1]);
        $setting =  $this->model->where([['name_key',$data[0]],['group_id',$group->id]])->first();
//        dd($setting);
        return $setting;
    }


    public function addCache(Setting $setting)
    {
        $key =getSettingKey($setting);
        if(!Cache::has($key)) {
            $setting->load('langs');
            Cache::forever($key, $setting);
        }
        return Cache::get($key);
    }

    public function removeCache(Setting $setting)
    {
        $key =getSettingKey($setting);
        if(Cache::has($key)) {
            Cache::forget($key);
        }
    }

    public function updateCache(string $oldKey, Setting $setting)
    {
        if(Cache::has($oldKey)) {
            Cache::forget($oldKey);
        }
        $this->addCache($setting);
    }

    public function getCacheByKey(string $key)
    {
        $setting = null;
        if(Cache::has($key)) {
            $setting = Cache::get($key);
        }
        else{

            $setting =  $this->findBySettingKey($key);
            if($setting !== null )
            {

                if((bool)$setting->getAttribute('has_lang_data') ===true) {
//                    dd('ok');
                    $setting->load('langs');
//                    dd($setting);
                }
                self::addCache($setting);
            }
        }
        return $setting;
    }

    public function setSettings( $data,string $key,TypeSetting $type,GroupSetting $group,string $name)
    {
        $setting = new Setting($data);
        $setting->type()->associate($type);
        $setting->group()->associate($group);
        $setting->setAttribute('name_key',$key);
        $setting->setAttribute('name',$name);
        $setting->save();
        return $setting;
    }


}
