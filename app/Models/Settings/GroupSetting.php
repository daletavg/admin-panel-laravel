<?php

namespace App\Models\Settings;



use App\Models\Model;

/**
 * App\Models\Settings\GroupSetting
 *
 * @property int $id
 * @property string $name
 * @property string $name_key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Settings\Setting[] $settings
 * @property-read int|null $settings_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting whereNameKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\GroupSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class GroupSetting extends Model
{
    protected $table = 'group_setting';
    protected $fillable = ['name', 'name_key'];

    public function settings()
    {
        return $this->hasMany(Setting::class, 'group_id', 'id');
    }
    public static function getGroup(string $groupKey)
    {
        return self::where('name_key', $groupKey)->first();
    }
}
