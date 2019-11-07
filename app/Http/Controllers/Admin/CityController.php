<?php

namespace App\Http\Controllers\Admin;

use App\Models\City\City;
use App\Models\City\CityLang;
use App\Models\Language;
use App\Models\Place;
use App\Models\PlaceLang;
use App\Repository\LanguageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class CityController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars = [];
        $vars['items'] = City::with('lang')->get();
        $this->setCardTitle('Города');
        $this->setContent(view('admin.cities.index',$vars));
        return $this->main();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vars = [];
        $this->setCardTitle('Создание города');
        $this->setContent(view('admin.cities.create',$vars));
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
        $cityData = $request->except('_token','data');
        $city = new City();
        $city->fill($cityData);
        $city->save();

        $city->saveLang($request->get('data'));



        if($request->has('saveClose')){
            return redirect()->route('admin.cities.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.cities.edit',$city)->with('success','Запись успешно создана!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {

        $city = $city->load('langs','place.langs');
         $vars = [];
        $vars['edit']=$city;

        $this->setCardTitle('Редактирование города');
        $this->setContent(view('admin.cities.edit',$vars));
        return $this->main();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $deleted = $request->get('deleted');
        if(!is_null($deleted))
        {
            $deleted = explode(',',$deleted);

            foreach ($deleted as $id)
            {
                Place::where('id',$id)->first()->delete();
            }
        }
        $langData = $request->get('data');
        foreach ($langData as $langKey => $data)
        {
            $city->lang($langKey)->first()->update($data);
        }
        $placesLang = $request->get('place');
        if(!is_null($placesLang)) {
            foreach ($placesLang as $placeLang) {
                if (array_key_exists('id', $placeLang)) {
                    $place = Place\Place::with('lang')->where('id', $placeLang['id'])->first();
                    Arr::forget($placeLang, 'id');
                    foreach ($placeLang as $langKey => $data) {
                        $place->lang($langKey)->first()->update($data);
                    }

                } else {

                    $place = new Place\Place();
                    $city->place()->save($place);

                    foreach ($placeLang as $langKey => $data) {
                        $lang = (new Place\PlaceLang())->fill($data);
                        $lang->language()->associate(Language::getLanguageByKey($langKey));
                        $place->lang()->save($lang);
                    }
                }
            }
        }



        if($request->has('saveClose')){
            return redirect()->route('admin.cities.index')->with('success','Запись успешно отредактирована!');
        }

        return redirect()->route('admin.cities.edit',$city)->with('success','Запись успешно создана!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success','Запись успешно удалена!');
    }
}
