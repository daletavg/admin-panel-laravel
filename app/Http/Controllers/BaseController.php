<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{

    protected $data = [];
    private $baseView;
    private $content = null;


    protected function setSections($sections)
    {
        $this->data['sections'] = $sections;
    }

    protected function setBaseViewName(string $viewName){
        $this->baseView = $viewName;
    }

    protected function getBaseViewName(){
        return $this->baseView;
    }

    protected function setDataOnBaseView(array $data){
        \View::composer($this->getBaseViewName(), function($view) use ($data)
        {
            $view->with($data);
        });
    }
}
