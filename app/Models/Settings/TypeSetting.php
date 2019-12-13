<?php

namespace App\Models\Settings;


use App\Models\Model;

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
