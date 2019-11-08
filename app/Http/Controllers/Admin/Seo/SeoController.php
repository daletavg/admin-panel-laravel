<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoController extends AdminController
{
    public function index()
    {
        $vars['items'] =[
            [
                'name'=>'Генерация sitemap',
                'url'=>route('admin.seo.sitemap.index'),
            ],
            [
                'name'=>'Редактирование robots.txt',
                'url'=>route('admin.seo.robots.index'),
            ],
            [
                'name'=>'Редактирование метатегов',
                'url'=>route('admin.seo.meta.index'),
            ],


        ];
        $this->setCardTitle('SEO');
        $this->setContent(view('admin.seo.index',$vars));
        return $this->main();
    }
}
