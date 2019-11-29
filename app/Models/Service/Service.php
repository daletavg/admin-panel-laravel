<?php

namespace App\Models\Service;

use App\Contracts\HasLangData;
use App\Traits\LangDataTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements HasLangData
{
    use LangDataTrait;
    protected $table = 'services';

    public function getLangClass(): string
    {
        return ServiceLang::class;
    }
}
