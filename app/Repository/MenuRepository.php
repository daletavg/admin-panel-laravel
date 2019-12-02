<?php


namespace App\Repository;


class MenuRepository
{
    static function getMenu()
    {

        $data = [

            ['link' => 'admin.users.index',
                'name' => __('admin.user.users'),
                'icon' => 'person_add'],
            ['link' => 'admin.banners.index',
                'name' => __('admin.banner.banner'),
                'icon' => 'insert_photo'],
            ['link' => 'admin.services.index',
                'name' => __('admin.setvices.service'),
                'icon' => 'group'],
            ['link' => 'admin.feedback.index',
                'name' => __('admin.feedback'),
                'icon' => 'feedback'],
            ['link' => 'admin.seo.index',
                'name' => 'SEO',
                'icon' => 'emoji_objects'],
        ];
//        dd(auth()->check());
        if (auth()->user()->can('translate')) {
            array_push($data,
                ['link' => 'admin.translate.index',
                    'name' => __('admin.localization'),
                    'icon' => 'language'],
                ['link' => 'admin.language-manager.index',
                    'name' => __('admin.languages.languages_management'),
                    'icon' => 'note']);

        }
        array_push($data, ['link' => 'admin.settings.index',
            'name' => __('admin.settings'),
            'icon' => 'settings']);

        return $data;
    }
}
