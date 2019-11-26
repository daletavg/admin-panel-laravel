<?php

namespace App\Models;



class Redirect extends Model
{
    protected $table = 'redirects';
    protected $fillable = ['from','to','code','active'];

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
