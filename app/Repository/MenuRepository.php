<?php


namespace App\Repository;


class MenuRepository
{

    static function getMenu()
    {
        $data = collect([
            ['link' => 'admin.testimonials.index',
                'name' => 'Отзывы',
                'icon' => '<i class="far fa-comment"></i>'],
            ['link' => 'admin.feedback.index',
                'name' => __('admin.feedback'),
                'icon' => '<i class="far fa-comment-alt"></i>'],
            ['link' => 'admin.seo.index',
                'name' => 'SEO',
                'icon' => '<i class="fas fa-lightbulb"></i>']]);

        if (auth()->user()->can('translate')) {
            $data->add(['link' => 'admin.translate.index',
                'name' => __('admin.localization'),
                'icon' => '<i class="fas fa-language"></i>']);
        }
        if(auth()->user()->can('languages')){
            $data->add(['link' => 'admin.language-manager.index',
                'name' => __('admin.languages.languages_management'),
                'icon' => '<i class="fas fa-globe"></i>']);
        }
        $data->add(['link' => 'admin.settings.index',
            'name' => __('admin.settings'),
            'icon' => '<i class="fas fa-cogs"></i>']);

        return $data->toArray();
    }

}
