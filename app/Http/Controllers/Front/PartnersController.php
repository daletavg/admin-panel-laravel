<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnersController extends SiteController
{
    public function index()
    {
        $this->setContent(view('public.partners'));
        return $this->main();
    }
}
