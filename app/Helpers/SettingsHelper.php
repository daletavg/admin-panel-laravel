<?php
if (!function_exists('getSettingData')) {
    function getSettingData(string $key)
    {
        if (checkKey($key)) {
            $setting = (new \App\Repository\SettingsRepository(app()))->getCacheByKey($key);
            if ($setting === null) {
                return $key;
            }
            if ((bool)$setting->getAttribute('has_lang_data') == true) {

                $setting = $setting->langs->where('language_id', \App\Repository\LanguageRepository::getCurrentLocaleId());
                $data = \Illuminate\Support\Arr::get($setting->first(), 'data');
                return $data;
            }

            return $setting->getAttribute('data');
        }
        return $key;
    }
}

if (!function_exists('getSettingKey')) {
    function getSettingKey(\App\Models\Settings\Setting $setting): string
    {
        return $setting->name_key . '.' . $setting->group->name_key;
    }
}
