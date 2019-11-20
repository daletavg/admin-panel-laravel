<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PosterRequest;
use App\Models\City\City;
use App\Models\City\CityLang;
use App\Models\Language;
use App\Models\Place\Place;
use App\Models\Poster\Poster;
use App\Models\Poster\PosterLang;
use App\Repository\PostersRepository;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class PosterController extends AdminController
{

    public function __construct(PostersRepository $postersRepository)
    {
        $this->itemRepository = $postersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vars = [];
        if($request->has('search') && $request->has('type'))
        {
            switch ($request->get('type')){
                case 'new':
                    $vars['items'] = $this->itemRepository->search($request->get('search'));
                    $vars['history'] = $this->itemRepository->paginateHistoryWithData(15);
                    $vars['search']=$request->get('search');
                    break;
                case 'history':
                    $vars['items'] = $this->itemRepository->paginateWithData(15);
                    $vars['history'] = $this->itemRepository->searchHistory($request->get('search'));
                    $vars['searchHistory']=$request->get('search');
                    break;
            }
        }else {
            $vars['items'] = $this->itemRepository->paginateWithData(15);
            $vars['history'] = $this->itemRepository->paginateHistoryWithData(15);
        }
        $this->setCardTitle('Афиши');
        $this->setContent(view('admin.poster.index',$vars));
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
        $vars['cities']=City::getCities();
        $this->setCardTitle('Создание афиши');
        $this->setContent(view('admin.poster.create',$vars));

        return $this->main();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PosterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PosterRequest $request)
    {
        $posterData = $request->except('_token','data');
        $city = City::find($request->get('city'));



        $poster = new Poster();
        $request->has('active')?$poster->active = 1 : $poster->active = 0;
        $request->has('on_general')?$poster->on_general = 1 : $poster->on_general = 0;
        if(!is_null($request->get('place')))
        {
            $place = Place::where('id', $request->get('place'))->first();
            if ($city->id == $place->city_id) {
                $poster->place()->associate($place);
            }
        }
        $poster->city()->associate($city);
        $poster->fill($posterData)->save();
        $poster->saveImage($request);

        $poster->saveLang( $request->get('data'));




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
        $poster = $poster->load('city.lang','langs','group.poster');
        $data = $vars = [];
        $vars['cities']=City::getCities();
        $vars['edit']=$poster;
        $this->setCardTitle('Редактирование афиши');
        $this->setContent(view('admin.poster.edit',$vars));
        return $this->main();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PosterRequest  $request
     * @param  Poster $poster
     * @return \Illuminate\Http\Response
     */
    public function update(PosterRequest $request, Poster $poster)
    {


        $data = $request->except('_token','_method','data','video','gallery');
        $data += ['video'=>json_encode($request->get('video'))];


        $city = City::find($request->get('city'));
        if(!is_null($request->get('place'))) {
            $place = Place::where('id', $request->get('place'))->first();
            if ($city->id == $place->city_id) {
                $poster->place()->associate($place);
            }
        }
        $request->has('active')?$poster->active = 1 : $poster->active = 0;
        $request->has('on_general')?$poster->on_general = 1 : $poster->on_general = 0;
        $poster->city()->associate($city);
        $poster = $poster->fill($data);
        $poster->save();
        $poster->saveImage($request);
        $poster->saveManyImages($request,'gallery');
        $langData = $request->get('data');
        foreach ($langData as $langKey => $data)
        {
            $poster->lang($langKey)->first()->update($data);
        }


        if($request->has('saveClose')){
            return redirect()->route('admin.posters.index')->with('success','Запись успешно отредактирована!');
        }

        return redirect()->route('admin.posters.edit',$poster)->with('success','Запись успешно отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Poster $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster)
    {
        $poster->deleteManyImages();
        $poster->delete();
        return redirect()->back()->with('success','Запись успешно удалена!');
    }


    public function getCityPlaces(Request $request)
    {
        $request->validate([
            'id'=>'required'
        ]);
        $id = $request->get('id');
        $places = Place::with('lang')->where('city_id',$id)->get()->toArray();
        $responce = [];
        foreach ($places as $place)
        {
            array_push($responce, [
                'id'=>$place['id'],
                'title'=>$place['lang']['title']
            ]);
        }

        return response($responce,200);
    }

    public function leaveGroup(Request $request)
    {
        if($request->has('poster'))
        {
            $id = $request->get('poster');
            $poster = Poster::where('id',$id)->first();
            $poster->poster_group_id = null;
            $poster->save();
            return redirect()->back()->with('success','Афиша удалена из группы!');
        }
        return redirect()->back()->with('error','Что-то пошло не так!');
    }
}
