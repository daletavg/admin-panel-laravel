<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\LaravelLocalization;

class IndexController extends Controller
{
    public function index(){

        return 'Current locale '.app()->getLocale();
    }
}
