<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class IndexController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->setCardTitle(__('admin.general.general'));
        return view('admin.index.index');
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return redirect()->back()->with('success',__('admin.general.cache_successful'));
    }

    public function storage()
    {
        Artisan::call('storage:link');
        return redirect()->back()->with('success','Link has been created!');
    }
}
