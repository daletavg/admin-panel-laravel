<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\CityLang;
use App\Models\Language;
use App\Models\Poster;
use App\Models\PosterLang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class PosterController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars = [];
        $data['cardTitle']='Афиши';
        $data['content']=view('admin.poster.index',$vars);
        return $this->main($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $vars = [];
        $vars['cities']=City::getCities();
        $data['cardTitle']='Создание афиши';
        $data['content']=view('admin.poster.create',$vars);
        return $this->main($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $posterData = $request->except('_token','date','data');
        $city = City::find($request->get('city'));
        $poster = new Poster();
        $poster->city()->associate($city);
        $poster->fill($posterData)->save();
        $poster->saveImage($request);

        $langData = $request->get('data');
        foreach ($langData as $langKey => $data)
        {
            $city = (new PosterLang())->fill($data);
            $city->language()->associate(Language::getLanguageByKey($langKey));
            $poster->lang()->save($city);
        }




        if($request->has('saveClose')){
            return redirect()->route('admin.posters.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.posters.edit',$poster)->with('success','Запись успешно создана!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Poster $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(Poster $poster)
    {
        $poster = $poster->load('city.lang','langs');
        $data = $vars = [];
        $vars['cities']=City::getCities();
        $vars['edit']=$poster;
        $data['cardTitle']='Редактирование афиши';
        $data['content']=view('admin.poster.edit',$vars);
        return $this->main($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
