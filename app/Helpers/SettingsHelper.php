<?php
function getSettingData(string $nameKey)
{
    $setting = \App\Models\Setting::findBySettingKey($nameKey);
    return $setting->data;
}

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

function checkYesNo($data)
{
    if ($data) {
        return 1;
    } else {
        return 0;
    }
}
