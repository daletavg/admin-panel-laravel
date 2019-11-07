<?php

namespace App\Models\Settings;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\Collection;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['data','name','name_key'];

    public function type():BelongsTo
    {
        return $this->belongsTo(TypeSetting::class,'type_id','id');
    }
    public function group():BelongsTo
    {
        return $this->belongsTo(GroupSetting::class,'group_id','id');
    }

    public function getSettingKey():string
    {
        return $this->group->name_key.'.'.$this->name_key;
    }

    public function setSetting(TypeSetting $type,GroupSetting $group,string $nameKey,string $name){
        $this->type()->associate($type);
        $this->group()->associate($group);
        $this->name_key = $nameKey;
        $this->name = $name;
        return $this;
    }

    public static function findBySettingKey(string $key):Setting
    {

        $data = explode('.',$key);
        $group = GroupSetting::getGroup($data[0]);

        $setting =  Setting::where([['name_key',$data[1]],['group_id',$group->id]])->first();
        return $setting;
    }
    public static function getData()
    {

        $data = collect();
        $settings = Setting::all()->load('group','type');
        foreach ($settings as $setting)
        {
            $data->add(collect([
                'key'=>str_replace('.','--',$setting->getSettingKey()),
                'data'=>$setting->data,
                'type'=>$setting->type->type,
                'name'=>$setting->name,
            ]));
        }
        return $data;
    }

    public static function updateSetting(array $data)
    {
        $setting = Setting::findBySettingKey(str_replace('--','.',$data['key']));
        $setting->update([
            'data'=>$data['data']
        ]);
        $setting->save();
    }
}
