<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RobotsController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $vars = [];
        if (!file_exists(public_path('robots.txt'))){
            file_put_contents(public_path('robots.txt'),'User-agent: *'.PHP_EOL.'Disallow: /');
        }

        $vars['item'] = (string)file_get_contents(public_path('robots.txt'));
        $this->setCardTitle(__('admin.SEO.robots'));

        return view('admin.seo.robots.index',$vars);
    }

    public function update(Request $request)
    {
        $robots = (string)$request->get('robots');

        file_put_contents(public_path('robots.txt'),$robots);


        return redirect()->route('admin.seo.robots.index')->with('success',__('admin.row.edit_robots'));
    }
}
