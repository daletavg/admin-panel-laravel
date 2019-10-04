<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BaseController;
use App\Repository\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class AdminController extends BaseController
{
    public function main($data){

        $data['menu']= MenuRepository::getMenu();

        if (\Arr::get($data, 'content') AND ($data['content'] instanceof \Illuminate\View\View)) {
            $data['sections'] = $data['content']->renderSections();
//            dd($data['sections']);
        }
        return view('admin.layouts.app',$data);
    }
}
