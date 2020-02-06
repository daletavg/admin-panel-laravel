<?php

namespace App\Models;

use App\Traits\Singleton;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GlobalSeoSetting
 *
 * @property int $id
 * @property int $www_redirect
 * @property string|null $www_code
 * @property int $index_php_redirect
 * @property string|null $index_php_code
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting whereIndexPhpCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting whereIndexPhpRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting whereWwwCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GlobalSeoSetting whereWwwRedirect($value)
 * @mixin \Eloquent
 */
class GlobalSeoSetting extends Model
{
//    use Singleton;
    protected $table = 'global_seo_settings';
    protected $fillable = ['www_redirect','www_code','index_php_redirect','index_php_code'];
    public $timestamps = false;

    protected static $codes = [
        301 => 'Moved Permanently',
        302 => 'Moved temporarily',
        303 => 'See Other',
        307 => 'Temporarily Redirect',
        308 => 'Permanent Redirect',
    ];

    public static function getCodes(): array
    {
        return self::$codes;
    }
}
