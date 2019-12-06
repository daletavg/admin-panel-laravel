<?php

namespace App\Models\Service;

use App\Contracts\HasLangData;
use App\Traits\Models\HasLangDataTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements HasLangData
{
    use HasLangDataTrait;
    protected $table = 'services';

    public function getLangClass(): string
    {
        return ServiceLang::class;
    }
}
