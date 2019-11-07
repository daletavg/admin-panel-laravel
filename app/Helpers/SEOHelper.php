<?php
if (!function_exists('getMeta')) {
    function getMeta()
    {
        return \App\Models\Meta::getMetaData();
    }
}

if (!function_exists('showMeta')) {
    function showMeta($value, $field = 'h1')
    {
        $meta = \Arr::get(getMeta()->toArray()['lang'], $field, $value);
        return $meta ?: $value;
    }
}
