<?php

namespace App\Models\Service;

use App\Contracts\LangDataContract;
use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class ServiceLang extends Model implements LangDataContract
{
    use LanguageTrait;

    protected $table = 'service_lang';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
