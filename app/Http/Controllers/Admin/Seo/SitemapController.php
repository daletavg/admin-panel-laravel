<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class SitemapController extends AdminController
{
    public function index(Request $request)
    {
        if($request->has('generate'))
        {
            Artisan::call('sitemap:generate');
            return redirect()->route('admin.seo.sitemap.index')->with('success','sitemap.xml успешно сгенерирован!');
        }
        $this->setCardTitle('Sitemap');
        $this->setContent(view('admin.seo.sitemap.index'));
        return $this->main();
    }

    public function edit()
    {
        if (!file_exists(public_path('sitemap.xml'))){
            file_put_contents(public_path('sitemap.xml'),'');
        }

        $vars['item'] = (string)file_get_contents(public_path('sitemap.xml'));

        $this->setCardTitle('Редактирование sitemap.xml');
        $this->setContent(view('admin.seo.sitemap.edit',$vars));

        return $this->main();
    }
    public function update(Request $request)
    {
        $sitemap = (string)$request->get('sitemap');

        file_put_contents(public_path('sitemap.xml'),$sitemap);
        return redirect()->route('admin.seo.sitemap.index')->with('success','sitemap.xml успешно изменен!');

    }
}
