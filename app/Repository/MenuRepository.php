<?php


namespace App\Repository;


class MenuRepository
{
    static  function getMenu(){

       $data = [
           ['link'=>'admin.feedback.index',
               'name'=>'Обратная связь',
               'icon'=>'feedback'],
           ['link'=>'admin.posters.index',
               'name'=>'Афиши',
               'icon'=>'list_alt'],
           ['link'=>'admin.tour.index',
               'name'=>'Гастроли',
               'icon'=>'flight_takeoff'],
           ['link'=>'admin.about.index',
               'name'=>'О компании',
               'icon'=>'description'],
           ['link'=>'admin.partners.index',
               'name'=>'Партнеры',
               'icon'=>'people_alt'],
           ['link'=>'admin.cities.index',
               'name'=>'Города',
               'icon'=>'location_city'],
           ['link'=>'admin.seo.index',
               'name'=>'SEO',
               'icon'=>'emoji_objects'],


       ];

       if(auth()->user()->can('translate'))
       {
           array_push($data,['link'=>'admin.translate.index',
               'name'=>'Локализация',
               'icon'=>'language']);
       }
       array_push($data,['link'=>'admin.settings.index',
           'name'=>'Настройки',
           'icon'=>'settings']);

        return $data;
    }
}
