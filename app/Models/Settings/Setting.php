<?php

namespace App\Models\Settings;



use App\Contracts\HasLangData;
use App\Contracts\LangDataContract;
use App\Models\Language;
use App\Traits\Models\HasLangDataTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use phpDocumentor\Reflection\Types\Collection;

/**
 * App\Models\Settings\Setting
 *
 * @property int $id
 * @property int $type_id
 * @property int $group_id
 * @property string $name
 * @property string $name_key
 * @property int $has_lang_data
 * @property string|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Settings\GroupSetting $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Settings\SettingLang[] $langs
 * @property-read int|null $langs_count
 * @property-read \App\Models\Settings\TypeSetting $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereHasLangData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereNameKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
