<?php


namespace App\Traits\Models;



use App\Repository\LanguageRepository;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasLangDataTrait
{
    public function lang($locale = null): HasOne
    {
        if (is_null($locale)) {
            $locale = LanguageRepository::getCurrentLocaleId();
        } else {
            $locale = LanguageRepository::getLocaleIdByLocale($locale);
        }

        return $this->hasOne($this->getLangClass())->where('language_id', $locale);
    }

    public function langs(): HasMany
    {
        return $this->hasMany($this->getLangClass());
    }

    public function getLang(string $attribute)
    {
        if($this->lang == null){
            return $this->lang()->first()->getAttribute($attribute);
        }else{
            return $this->lang->getAttribute($attribute);
        }
    }

}
