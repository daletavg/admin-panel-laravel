<?php


namespace App\Traits\Repository;


use App\Contracts\HasLangData;
use App\Contracts\LangDataContract;
use App\Contracts\Repository\SaveLangDataContract;
use App\Models\Language;

trait SaveLangDataTrait
{
    public function saveLang(array $langData, HasLangData $item)
    {
        /** @var SaveLangDataContract $this  * */
        $className = $this->langModel();

        foreach ($langData as $langKey => $data) {
            /** @var LangDataContract $langData * */
            $langData = new $className();
            $
            $langData->setLanguage(Language::getLanguageByKey($langKey));
            $langData->setData($data);

            $item->lang()->save($langData);
        }
    }

    public function createLangData($id, $langData)
    {
        $item = $this->find($id);
        $this->saveLang($langData,$item);
    }

    public function updateLang($id, array $langData)
    {
        $item = $this->find($id);
        foreach ($langData as $langKey => $data) {
            $item->lang($langKey)->first()->update($data);
        }
    }


}
