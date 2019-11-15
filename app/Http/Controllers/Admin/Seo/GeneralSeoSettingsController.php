<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use App\Models\GlobalSeoSetting;
use App\Repository\GlobalSeoSettingsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralSeoSettingsController extends AdminController
{
    public function __construct(GlobalSeoSettingsRepository $repository)
    {
        $this->itemRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setCardTitle('Глобальные настройки SEO');
        $vars['edit']= $this->itemRepository->first();
        $vars['codes']= GlobalSeoSetting::getCodes();
        $this->setContent(view('admin.seo.seo-settings.index',$vars));
        return $this->main();
    }




    public function update(Request $request)
    {
        $seo = $this->itemRepository->first('id');
        $data=$request->except('_token','_method');
        $this->itemRepository->update($data,$seo->id);

        if($request->has('saveClose')){
            return redirect()->route('admin.seo.index')->with('success','Глобальные сео настройки успешно изменены!');
        }

        return redirect()->route('admin.seo.global-seo.index')->with('success','Глобальные сео настройки успешно изменены!');
    }

}
