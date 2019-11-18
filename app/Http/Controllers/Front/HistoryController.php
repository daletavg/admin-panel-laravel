<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends SiteController
{
    public function index()
    {
        $this->setContent(view('public.history'));
        return $this->main();
    }
}
