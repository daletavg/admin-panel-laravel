<?php
function getCurrentLocale()
{
    static $lang = null;
    if (is_null($lang)) {
        $lang = \LaravelLocalization::getCurrentLocale();
    }

    return $lang;
}
