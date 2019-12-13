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

function getSpanStringFromTitle(string $string)
{
    if($string === null){
        return '';
    }
    $string = iconv(mb_detect_encoding($string, mb_detect_order(), true), "UTF-8", $string);
    $array = mb_str_split($string);
    $arraySpan = [];
    $newString = '';
    for ($i=0;$i<count($array);$i++){
        if(array_key_exists($i+1,$array) && $array[$i+1]===" "){
            $newString .= "<span class='space-item'>".$array[$i]."</span>\n";
        }else if ($array[$i]!==" ") {
            $newString .= "<span>".$array[$i]."</span>\n";
        }

    }


    return $newString;

}

