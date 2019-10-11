<?php

namespace App\Http\Controllers\admin;

use App\Models\Language;
use App\Models\Poster;
use App\Models\PosterGroup;
use App\Models\PosterGroupLang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars = [];
        $vars['items'] = PosterGroup::all();
        $data['cardTitle']='Гастроли';
        $data['content']=view('admin.group.index',$vars);
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
        $data['cardTitle']='Создание гастролей';
        $data['content']=view('admin.group.create',$vars);
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
        $posterGroupData = $request->except('_token','data');
        $posterGroup = new PosterGroup();
        $posterGroup->fill($posterGroupData);
        $posterGroup->save();


        $langData = $request->get('data');
        foreach ($langData as $langKey => $data)
        {
            $lang = (new PosterGroupLang())->fill($data);
            $lang->language()->associate(Language::getLanguageByKey($langKey));
            $posterGroup->lang()->save($lang);
        }




        if($request->has('saveClose')){
            return redirect()->route('admin.tour.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.tour.edit',$posterGroup)->with('success','Запись успешно создана!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posterGroup = PosterGroup::with('langs','poster')->where('id',$id)->first();
        $data = $vars = [];
        $vars['edit']=$posterGroup;
        $vars['posters']=Poster::whereNull('poster_group_id')->get()->load('lang');
        $data['cardTitle']='Редактирование гастролей';
        $data['content']=view('admin.group.edit',$vars);
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
