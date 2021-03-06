<?php
if(!function_exists('checkKey')){
    function checkKey(string $key):bool
    {
        return !(count(explode('.',$key))<2);
    }
}


if (!function_exists('showEditor')) {
    function showEditor($id)
    {
        return "
    CKEDITOR.replace('" . $id . "', {
    filebrowserBrowseUrl: '/elfinder/ckeditor',
    filebrowserImageBrowseUrl: '/elfinder/ckeditor',
    uiColor: '#9AB8F3',
    height: 300
    });
    ";
    }
}
if (!function_exists('dataWithId')) {
    function dataWithId($data, $dataIsId = false)
    {
        $result = [];
        foreach ($data as $key => $item) {
            if ($dataIsId) {
                array_push($result, [
                    'value' => $item,
                    'id' => $item,
                ]);
            } else {
                array_push($result, [
                    'value' => $item,
                    'id' => $key,
                ]);
            }

        }
        return $result;
    }
}
if (!function_exists('dataWithKeyName')) {
    function dataWithKeyName($data)
    {
        $result = [];
        foreach ($data as $key => $item) {
            array_push($result, [
                'value' => $key . ' ' . $item,
                'id' => $key,
            ]);
        }
        return $result;
    }
}
if (!function_exists('checkYesNo')) {
    function checkYesNo($data)
    {
        if ($data) {
            return 1;
        } else {
            return 0;
        }
    }
}
if (!function_exists('isActive')) {
    function isActive(array $data) :bool
    {
        $result = array_key_exists('active',$data);
        return $result;
    }
}

if(!function_exists('inputLanguageName')){
    function inputLanguageName(string $name){
        if(preg_match('/[a-zA-Z]*\[[a-zA-Z]*\]\[[a-zA-Z]*\]/',$name)){
            return preg_replace('/\]/','',preg_replace('/\[|\]\[/','.',$name));
        }
        return $name;
    }
}

if(!function_exists('activeYesNo')) {
    function activeYesNo($active)
    {
        return $active ? 'Да' : 'Нет';
    }
}
if(!function_exists('minimizeText')) {
    function minimizeText($newsText, $count = 250)
    {


        if (\Illuminate\Support\Str::length($newsText) <= $count) {
            return $newsText;
        }
        $newNewsText = \Illuminate\Support\Str::limit($newsText,$count);
        return $newNewsText . "<span>...</span>";
    }
}
