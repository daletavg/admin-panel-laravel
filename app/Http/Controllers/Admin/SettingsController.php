<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings\GroupSetting;
use App\Repository\SettingsRepository;
use Illuminate\Http\Request;

class SettingsController extends AdminController
{

    public function __construct(SettingsRepository $settingsRepository)
    {
        parent::__construct();
        $this->itemRepository = $settingsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars = [];
        $vars['groupSettings'] = GroupSetting::all()->load('settings.lang');
        $this->setCardTitle(__('admin.settings'));
        return view('admin.settings.index',$vars);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->except('_token','_method');
        foreach ( $data as $key=>$data)
        {

            $setting = $this->itemRepository->findByKey($key);
            if(is_array($data)){
                $this->itemRepository->updateLangSetting($setting->id,$data);
                $this->itemRepository->updateLang($setting->id,$data);

            }
            else{
                $this->itemRepository->update(['data'=>$data],$setting->id);

            }
            $newSetting = $this->itemRepository->findByKey($key);
            $this->itemRepository->updateCache(getSettingKey($newSetting),$newSetting);
        }


        return redirect()->back()->with('success',__('admin.row.edit_settings'));
    }
}
