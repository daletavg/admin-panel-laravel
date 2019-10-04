<?php
function getSettingData(string $nameKey){
    $setting =\App\Models\Setting::findBySettingKey($nameKey);
    return $setting->data;
}
