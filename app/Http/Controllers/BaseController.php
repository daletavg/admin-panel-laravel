<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $data = [];
    abstract public function main();

    protected function setContent($contnent)
    {
        $this->data['content']= $contnent;
    }

    protected function setSections($sections)
    {
        $this->data['sections'] = $sections;
    }
}
