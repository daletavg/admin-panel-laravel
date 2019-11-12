<?php

if (!function_exists('getTranslateKey')) {

    function getTranslateKey(\App\Models\Translate\Translate $translate)
    {
        return $translate->key.'.'.$translate->group;
    }

}
if (!function_exists('getTranslate')) {

    function getTranslate($key)
    {
        $tr = new \App\Repository\TranslateRepository();
        $translate = $tr->getTranslateByKey($key);
        if($translate === null)
        {
            return $key;
        }
        $translate=$translate->langs->where('language_id',\App\Repository\LanguageRepository::getCurrentLocaleId());
        return \Illuminate\Support\Arr::get($translate->first(),'data');
    }
}
