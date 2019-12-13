<?php

namespace App\Http\Controllers\Admin;

use App\Repository\LanguageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageManagerController extends AdminController
{
    public function __construct(LanguageRepository $languageRepository)
    {
        parent::__construct();
        $this->itemRepository = $languageRepository;
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $request->validate([
              'dataId'=>'required',
              'active'=>'required',
            ]);
            $this->itemRepository->update(['active'=>$request->get('active')],$request->get('dataId'));
            $this->itemRepository->updateLanguagesCache();
        }

        $this->setCardTitle(__('admin.languages.languages_management'));
        $vars['items']=$this->itemRepository->all();

        return view('admin.language-management.index',$vars);
    }
}
