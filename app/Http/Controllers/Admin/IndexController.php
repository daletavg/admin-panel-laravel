<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class IndexController extends AdminController
{

    public function index()
    {
        $data=[];
        $this->setCardTitle('Главная страница');
        $this->setContent(view('admin.index.index'));
        return $this->main($data);
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return redirect()->back()->with('success','Кеш успешно очищен!');
    }
}
