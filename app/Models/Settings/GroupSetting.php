<?php

namespace App\Models\Settings;



use App\Models\Model;

class GroupSetting extends Model
{
    protected $table = 'group_setting';
    protected $fillable = ['name', 'name_key'];

    public function settings()
    {
        return $this->hasMany(Setting::class, 'type_id', 'id');
    }
    public static function getGroup(string $groupKey)
    {
        return self::where('name_key', $groupKey)->first();
    }
}
