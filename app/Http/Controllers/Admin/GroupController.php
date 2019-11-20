<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;

use App\Models\Poster\Poster;
use App\Models\PosterGroup\PosterGroup;
use App\Models\PosterGroup\PosterGroupLang;
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
        $vars['items'] = PosterGroup::all()->load('lang');
       $this->setCardTitle('Гастроли');
        $this->setContent(view('admin.group.index',$vars));
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
        $this->setCardTitle('Создание гастролей');
        $this->setContent(view('admin.group.create',$vars));
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
        $posterGroupData = $request->except('_token','data');
        $posterGroup = new PosterGroup();
        $posterGroup->fill($posterGroupData);
        $posterGroup->save();


        $langData = $request->get('data');
        $posterGroup->saveLang($langData);




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

        $this->setCardTitle('Редактирование гастролей');
        $this->setContent(view('admin.group.edit',$vars));
        return $this->main();
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
        $data = $request->except('_token','_method','data');
        $poster = PosterGroup::where('id',$id)->first();
        $poster = $poster->fill($data);
        $poster->save();

        $langData = $request->get('data');
        foreach ($langData as $langKey => $data)
        {
            $poster->lang($langKey)->first()->update($data);
        }


        if($request->has('saveClose')){
            return redirect()->route('admin.tour.index')->with('success','Запись успешно отредактирована!');
        }

        return redirect()->route('admin.tour.edit',$poster)->with('success','Запись успешно отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group =PosterGroup::where('id',$id)->first();
        $group->delete();
        return redirect()->back()->with('success','Запись успешно удалена!');
    }
}
