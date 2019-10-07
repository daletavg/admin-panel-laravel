<?php
function getSettingData(string $nameKey){
    $setting =\App\Models\Setting::findBySettingKey($nameKey);
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
