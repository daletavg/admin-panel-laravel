<?php


namespace App\Repository;


class MenuRepository
{
    static  function getMenu(){

        return [
            ['link'=>'admin.stocks.index',
                'name'=>'Акции',
                'icon'=>'accessibility_new'],

            ['link'=>'admin.services.index',
                'name'=>'Услуги',
                'icon'=>'group'],
            ['link'=>'admin.settings.index',
                'name'=>'Настройки',
                'icon'=>'settings'],
        ];

    }
}
