<?php

namespace App\Models\Settings;


use App\Models\Model;

/**
 * App\Models\Settings\TypeSetting
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Settings\Setting[] $settings
 * @property-read int|null $settings_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\TypeSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\TypeSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\TypeSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\TypeSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\TypeSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Settings\TypeSetting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class TypeSetting extends Model
{
    protected $table = 'type_setting';
    protected $fillable = ['name', 'type'];
    public $timestamps = false;

    public function settings()
    {
        return $this->hasMany(Setting::class, 'type_id', 'id');
    }

    public static function getType(string $typeKey)
    {
        return self::where('type', $typeKey)->first();
    }
}
