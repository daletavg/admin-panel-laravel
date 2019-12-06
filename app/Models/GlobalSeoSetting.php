<?php

namespace App\Models;

use App\Traits\Singleton;
use Illuminate\Database\Eloquent\Model;

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
