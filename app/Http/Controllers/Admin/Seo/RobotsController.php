<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RobotsController extends AdminController
{
    public function index()
    {
        $vars = [];
        if (!file_exists(public_path('robots.txt'))){
            file_put_contents(public_path('robots.txt'),'User-agent: *'.PHP_EOL.'Disallow: /');
        }

        $vars['item'] = (string)file_get_contents(public_path('robots.txt'));
        $this->setCardTitle('Редактирование robot.txt');
        $this->setContent(view('admin.seo.robots.index',$vars));
        return $this->main();
    }

    public function update(Request $request)
    {
        $robots = (string)$request->get('robots');

        file_put_contents(public_path('robots.txt'),$robots);


        return redirect()->route('admin.seo.robots.index')->with('success','robots.txt успешно отредоктирован!');
    }
}
