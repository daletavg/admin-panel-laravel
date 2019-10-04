<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends AdminController
{

    public function index()
    {
        $data=[];
        $data['content']=view('admin.index.index');
        $data['cardTitle']='Главная страница';
        return $this->main($data);
    }
}
