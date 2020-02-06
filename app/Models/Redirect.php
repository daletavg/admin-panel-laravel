<?php

namespace App\Models;



/**
 * App\Models\Redirect
 *
 * @property int $id
 * @property string|null $from
 * @property string|null $to
 * @property string $code
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Redirect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
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
