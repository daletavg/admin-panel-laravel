<?php


namespace App\Traits;


use App\Contracts\LangDataContract;
use App\Models\Language;
use App\Models\PosterGroupLang;
use App\Repository\LanguageRepository;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait LangDataTrait
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

    /**
     * @deprecated
     * @param array $langData
     */
    public function saveLang(array $langData)
    {
        $className = $this->getLangClass();

        foreach ($langData as $langKey => $data) {
            /** @var LangDataContract $langData * */
            $langData = new $className();
            $langData->setLanguage(Language::getLanguageByKey($langKey));
            $langData->setData($data);

            $this->lang()->save($langData);
        }
    }

    public function updateLang(array $langData)
    {
        foreach ($langData as $langKey => $data) {
            $this->lang($langKey)->first()->update($data);
        }

    }


}
