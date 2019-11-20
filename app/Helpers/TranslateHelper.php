<?php

if (!function_exists('getTranslateKey')) {

    function getTranslateKey(\App\Models\Translate\Translate $translate)
    {
        return $translate->key.'.'.$translate->group;
    }

}
if (!function_exists('getTranslate')) {

    function getTranslate($key, $dataReplace = null)
    {
        $tr = new \App\Repository\TranslateRepository(app());
        $translate = $tr->getTranslateByKey($key);
        if($translate === null)
        {
            return $key;
        }
        $translate=$translate->langs->where('language_id',\App\Repository\LanguageRepository::getCurrentLocaleId());
        $data = \Illuminate\Support\Arr::get($translate->first(),'data');
        if($dataReplace!==null)
        {
            $data = sprintf($data, ...$dataReplace);
        }
//        if(env('APP_DEBUG')==true){
//            return '<div class="border" style="color: red">'.$data.'</div>';
//        }
        return$data;
    }
}
