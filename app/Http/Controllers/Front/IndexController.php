<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\LaravelLocalization;

class IndexController extends SiteController
{
    public function index(){
        $data = [];
        $data['content']= view('public.index');
        return $this->main($data);
    }
}
