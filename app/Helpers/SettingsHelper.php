<?php
function getSettingData(string $key)
{
    $setting = (new \App\Repository\SettingsRepository(app()))->getCacheByKey($key);
//    dd($setting);
    if($setting === null)
    {
        return $key;
    }
    if((bool)$setting->getAttribute('has_lang_data') == true){

        $setting=$setting->langs->where('language_id',\App\Repository\LanguageRepository::getCurrentLocaleId());
        $data = \Illuminate\Support\Arr::get($setting->first(),'data');
        return $data;
    }

    return $setting->getAttribute('data');

}

function getSettingKey(\App\Models\Settings\Setting $setting):string
{
    return $setting->name_key.'.'.$setting->group->name_key;
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
