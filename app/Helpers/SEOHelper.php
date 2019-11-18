<?php
if (!function_exists('getMeta')) {
    function getMeta()
    {
        return App\Models\Meta\Meta::getMetaData();
    }
}

if (!function_exists('showMeta')) {
    function showMeta($value, $field = 'h1')
    {
        $metaArr = getMeta();
        $meta=null;
        if($metaArr!==null) {
            $meta = \Arr::get($metaArr->toArray()['lang'], $field, $value);
        }

        return $meta ?: $value;
    }
}
