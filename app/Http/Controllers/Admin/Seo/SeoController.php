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
                'name'=>__('admin.SEO.global_redirects'),
                'url'=>route('admin.seo.global-seo.index'),
            ],
            [
                'name'=>__('admin.SEO.sitemap'),
                'url'=>route('admin.seo.sitemap.index'),
            ],
            [
                'name'=>__('admin.SEO.robots'),
                'url'=>route('admin.seo.robots.index'),
            ],
            [
                'name'=>__('admin.SEO.meta'),
                'url'=>route('admin.seo.meta.index'),
            ],
            [
                'name'=>__('admin.SEO.redirects'),
                'url'=>route('admin.seo.redirects.index'),
            ],


        ];
        $this->setCardTitle('SEO');
        $this->setContent(view('admin.seo.index',$vars));
        return $this->main();
    }
}
