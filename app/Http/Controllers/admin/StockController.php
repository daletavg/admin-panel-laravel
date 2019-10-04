<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ImageSaver;
use App\Models\Image;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class StockController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars = [];
        $vars['items']=Stock::all()->load('images');

        $data['content']=view('admin.stock.index',$vars);
        $data['cardTitle']='Акции';
        return $this->main($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $data['content']=view('admin.stock.create');
        $data['cardTitle']='Создание акции';
        return $this->main($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//todo make request
    {

        $data = $request->except('_token','image');
        $data['active']= $data['active']??0;
        $stock = new Stock();
        $stock->fill($data)->save();
        $stock->saveImage($request);
        if($request->has('saveClose')){
            return redirect()->route('admin.stocks.index',$stock)->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.stocks.edit',$stock)->with('success','Запись успешно создана!');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {


        $data = $vars =[];
        $vars['edit']=$stock->load('images');

        $data['content']=view('admin.stock.edit',$vars);

        $data['cardTitle']='Редактирование акции';

        return $this->main($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $data = $request->except('_token','_method','image');
        $data['active']= $data['active']??0;
        $stock->fill($data);
        $stock->save();
        $stock->saveImage($request);



        if($request->has('saveClose')){
            return redirect()->route('admin.stocks.index',$stock)->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.stocks.edit',$stock)->with('success','Запись успешно создана!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {

        if(!is_null($stock)) {
            $stock->delete();
        }
        return redirect()->back()->with('success','Запись успешно удалена!');
    }
}
