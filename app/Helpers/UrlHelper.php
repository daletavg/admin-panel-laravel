<?php
function activeLink($routeName,$data)
{
    if(Request::fullUrl() == $routeName){
        return $data;
    }
    return null;
}

if (!function_exists('getUrlWithoutHost')) {
    function getUrlWithoutHost($url)
    {
        $domain = env('APP_URL');
        $url = urlWithoutPublic($url);
        $clean = \Str::replaceFirst($domain, '', $url);
        return $clean;
    }
}
if (!function_exists('urlWithoutPublic')) {
    function urlWithoutPublic($url)
    {
        return \Str::replaceFirst('/public', '', $url);
    }
}

if (!function_exists('getNonLocaledUrl')) {
    function getNonLocaledUrl($url = null)
    {
        if (is_null($url)) {
            $url = request()->getPathInfo();
        }

        return \LaravelLocalization::getNonLocalizedURL($url);
    }
}

if (!function_exists('langUrl')) {
    function langUrl($url, $locale = false): string
    {
        $localeCode = $locale ?: getCurrentLocale();

        return \LaravelLocalization::getLocalizedURL($localeCode, $url, [], false);
    }
}



if (!function_exists('getUrlWithoutHost')) {
    function getUrlWithoutHost($url)
    {
        $domain = env('APP_URL');
        $url = urlWithoutPublic($url);
        $clean = \Str::replaceFirst($domain, '', $url);
        return $clean;
    }
}
