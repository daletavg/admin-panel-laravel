<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Partner\Partner;
use App\Models\Partner\PartnerLang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars = [];
        $vars['items'] = Partner::all();
        $this->setCardTitle('Партнеры');
        $this->setContent(view('admin.partner.index',$vars));
        return $this->main();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $vars = [];
        $this->setCardTitle('Создание партнера');
        $this->setContent(view('admin.partner.create',$vars));

        return $this->main();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partnerData = $request->except('_token','data');
        $partner = new Partner();
        $partner->fill($partnerData);
        $partner->save();

        $partner->saveImage($request);

        $partner->saveLang($request->get('data'));




        if($request->has('saveClose')){
            return redirect()->route('admin.partners.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.partners.edit',$partner)->with('success','Запись успешно создана!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $partner = $partner->load('langs');
        $data = $vars = [];
        $vars['edit']=$partner;
        $this->setCardTitle('Редактирование партнера');
        $this->setContent(view('admin.partner.edit',$vars));
        return $this->main();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $data = $request->except('_token','_method','data');

        $partner = $partner->fill($data);
        $partner->save();
        $partner->saveImage($request);
        $langData = $request->get('data');
        foreach ($langData as $langKey => $data)
        {
            $partner->lang($langKey)->first()->update($data);
        }


        if($request->has('saveClose')){
            return redirect()->route('admin.partners.index')->with('success','Запись успешно отредактирована!');
        }

        return redirect()->route('admin.partners.edit',$partner)->with('success','Запись успешно отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success','Запись успешно удалена!');
    }
}
