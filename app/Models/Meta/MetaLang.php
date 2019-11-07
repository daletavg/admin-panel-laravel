<?php

namespace App\Models;


use App\Contracts\LangDataContract;
use App\Traits\EloquentMultipleForeignKeyUpdate;
use App\Traits\LanguageTrait;
use App\Traits\Models\BelongsToLanguage;

class MetaLang extends Model implements LangDataContract
{
    use LanguageTrait;
    protected $table = 'meta_lang';
    protected $primaryKey = ['meta_id', 'language_id'];

    protected $fillable = ['h1','title','keywords','description','header','footer','text_top','text_bottom'];

    public $incrementing = false;

    protected $guarded = [];

    public $timestamps = false;

    public function meta(){
        return $this->belongsTo(Meta::class);
    }

}
