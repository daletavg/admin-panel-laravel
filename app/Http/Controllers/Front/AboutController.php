<?php

namespace App\Http\Controllers\Front;

use App\Models\About;
use App\Models\Partner\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends SiteController
{
    public function index()
    {
        $vars['item']= About::with('lang')->first();
        $vars['partners'] = Partner::all()->load('lang','images');
        $this->setContent(view('public.about', $vars));
        return $this->main();
    }
}
