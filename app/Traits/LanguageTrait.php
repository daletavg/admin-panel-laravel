<?php


namespace App\Traits;


use App\Models\Language;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait LanguageTrait
{
    public function language():BelongsTo
    {
        return $this->belongsTo(Language::class,'language_id','id');
    }
}
