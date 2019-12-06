<?php


namespace App\Traits\Repository;


use App\Contracts\HasLangData;
use App\Contracts\LangDataContract;
use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Language;
use App\Repository\LanguageRepository;

trait SaveLangDataTrait
{
    private function saveLang(array $langData, $item)
    {
        /** @var SaveLangDataContract $this * */
        $className = $this->langModel();

        foreach ($langData as $langKey => $data) {
            if (!LanguageRepository::isLanguageActive($langKey)) {
                continue;
            }
            $langData = new $className();

            $langData->setLanguage(Language::getLanguageByKey($langKey));
            $langData->setData($data);
            $item->lang()->save($langData);
        }
    }

    public function createLangData($id, $langData)
    {
        $item = $this->find($id);
        $this->saveLang($langData, $item);
    }

    public function updateLang($id, array $langData)
    {
        $item = $this->find($id);
        foreach ($langData as $langKey => $data) {
            if (($lang = $item->lang($langKey)->first()) === null) {

                $this->saveLang([$langKey => $data], $item);
            } else {

                $lang->update($data);
            }
        }
    }


}
