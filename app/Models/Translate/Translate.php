<?php

namespace App\Models\Translate;



use App\Contracts\HasLangData;
use App\Models\Model;
use App\Traits\LangDataTrait;
use App\Traits\Singleton;

class Translate extends Model implements HasLangData
{
    use LangDataTrait;
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
