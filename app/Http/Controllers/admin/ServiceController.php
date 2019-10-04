<?php

namespace App\Http\Controllers\admin;

use App\Models\ManyImages;
use App\Models\Service;
use App\Models\ServicePrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class ServiceController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars =[];
        $vars['items']=Service::all();
        $data['content']=view('admin.service.index',$vars);
        $data['cardTitle']='Услуги';
        return $this->main($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $vars =[];
        $data['content']=view('admin.service.create',$vars);
        $data['cardTitle']='Создание услуги';
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
        $data = $request->except('_token','image');

        $stock = new Service();
        $stock->fill($data)->save();
        $stock->saveImage($request);
        if($request->has('saveClose')){
            return redirect()->route('admin.services.index',$stock)->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.services.edit',$stock)->with('success','Запись успешно создана!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $data = $vars =[];
        $vars['edit']=$service->load('images','price');

        $data['content']=view('admin.service.edit',$vars);

//        dd($data['content']->renderSections());
        $data['cardTitle']='Редактирование услуги';

        return $this->main($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {


        $data = $request->except('_token','_method','image','video');
        $data['active']= $data['active']??0;



        $service->fill($data);
        $service->video=json_encode($request->get('video'));
        $service->save();

        $service->saveImage($request);
        $service->saveManyImages($request, 'gallery');
        if(!is_null(Arr::first($request->get('data-price'))['title']) && !is_null(Arr::first($request->get('data-price'))['price']) ) {
            foreach ($request->get('data-price') as $price) {
                if (isset($price['price-id'])) {
                    $id = $price['price-id'];
                    unset($price['price-id']);
                    ServicePrice::where('id', $id)->first()->fill($price)->save();
                    continue;
                }
                $service->price()->save((new ServicePrice())->fill($price));
            }
        }



        if($request->has('saveClose')){
            return redirect()->route('admin.services.index',$service)->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.services.edit',$service)->with('success','Запись успешно создана!');
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
