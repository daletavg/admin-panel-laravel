<?php

namespace App\Http\Controllers\Front;

use App\Repository\PostersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\LaravelLocalization;

class IndexController extends SiteController
{

    public function __construct(PostersRepository $postersRepository)
    {
        $this->itemRepository = $postersRepository;
    }

    public function index(){

        $allItems = $this->itemRepository->active()->get()->load('lang','images','city.lang','place.lang');

        $vars['general']= $allItems->where('on_general',true);
        $vars['items']=$allItems->slice(0,8);

        $this->setContent(view('public.index',$vars));
        return $this->main();
    }
}
