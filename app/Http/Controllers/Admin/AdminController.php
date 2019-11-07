<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repository\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class AdminController extends BaseController
{
    public function main(){

        $this->setMenu(MenuRepository::getMenu());

        if (\Arr::get($this->data, 'content') AND ($this->data['content'] instanceof \Illuminate\View\View)) {
            $this->setSections($this->data['content']->renderSections());
        }
        return view('admin.layouts.app',$this->data);
    }


    protected function setCardTitle(string $title): void
    {
        $this->data['cardTitle'] = $title;
    }

    private function setMenu($menu)
    {
        $this->data['menu']= $menu;
    }




}
