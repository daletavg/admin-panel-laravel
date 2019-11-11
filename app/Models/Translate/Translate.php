<?php

namespace App\Models\Translate;



use App\Contracts\HasLangData;
use App\Models\Model;
use App\Traits\LangDataTrait;

class Translate extends Model implements HasLangData
{
    use LangDataTrait;
    protected $table = 'translates';
    protected $fillable = ['key','comment','group','type'];
    private $langClass = '';
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setLangClass(TranslateLang::class);
    }

    function setLangClass(string $className)
    {
        $this->langClass= $className;
    }

    function getLangClass(): string
    {
        return $this->langClass;
    }


    public static function getGroups()
    {
        return Translate::distinct('group')->pluck('group');
    }
}
