<?php


namespace App\Repository;


class MenuRepository
{
    static  function getMenu(){

        return [
            ['link'=>'admin.posters.index',
                'name'=>'Афиши',
                'icon'=>'list_alt'],

            ['link'=>'admin.posters.index',
                'name'=>'О компании',
                'icon'=>'description'],
            ['link'=>'admin.posters.index',
                'name'=>'Настройки',
                'icon'=>'settings'],
        ];

    }
}
