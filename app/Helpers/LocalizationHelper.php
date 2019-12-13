<?php
function getCurrentLocale()
{
    static $lang = null;
    if (is_null($lang)) {
        $lang = \LaravelLocalization::getCurrentLocale();
    }

    return $lang;
}
if (!function_exists('getLang')) {
    function getLang()
    {
        return \App\Helpers\LanguageHelper::getLanguageId() ?? getDefaultLang();
    }
}
