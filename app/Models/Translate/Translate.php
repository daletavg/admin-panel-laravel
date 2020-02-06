<?php

namespace App\Models\Translate;



use App\Contracts\HasLangData;
use App\Models\Model;
use App\Traits\Models\HasLangDataTrait;


/**
 * App\Models\Translate\Translate
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $comment
 * @property int $module_id
 * @property string|null $group
 * @property string $type
 * @property string|null $deleted_at
 * @property int|null $user_id Last edited by user
 * @property int|null $deleted_by User id deleted translate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translate\TranslateLang[] $langs
 * @property-read int|null $langs_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model active($active)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereGroupWithLang($group)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translate\Translate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model withLang()
 * @mixin \Eloquent
 */
class Translate extends Model implements HasLangData
{
    use HasLangDataTrait;
    protected $table = 'translate';
    protected $fillable = ['key','comment','group','type'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    function getLangClass(): string
    {
        return TranslateLang::class;
    }


    public static function getGroups()
    {
        return Translate::distinct('group')->pluck('group');
    }

    public function scopeWhereGroupWithLang($query, string $group)
    {

        return $query->where('group',$group)->with('lang');
    }
}
