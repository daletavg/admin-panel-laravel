<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends SiteController
{
    public function index()
    {

        $this->setContent(view('public.events'));
        return $this->main();
    }
}
