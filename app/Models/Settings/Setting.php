<?php

namespace App\Models\Settings;



use App\Contracts\HasLangData;
use App\Contracts\LangDataContract;
use App\Models\Language;
use App\Traits\Models\HasLangDataTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\Collection;

class Setting extends Model implements HasLangData
{
    use HasLangDataTrait;
    protected $table = 'settings';

    protected $fillable = ['data','name','name_key','has_lang_data'];
    function getLangClass(): string
    {
        return SettingLang::class;
    }


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function type():BelongsTo
    {
        return $this->belongsTo(TypeSetting::class,'type_id','id');
    }
    public function group():BelongsTo
    {
        return $this->belongsTo(GroupSetting::class,'group_id','id');
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
