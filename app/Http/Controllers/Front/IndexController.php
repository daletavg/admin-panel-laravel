<?php

namespace App\Http\Controllers\Front;

use App\Repository\PostersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Mcamara\LaravelLocalization\LaravelLocalization;

class IndexController extends SiteController
{

    public function __construct(PostersRepository $postersRepository)
    {
        $this->itemRepository = $postersRepository;
    }

    public function index(){
        $allItems = $this->itemRepository->active()->get()->load('lang','images','city.lang','place.lang');

        $vars['general']= $allItems->where('on_general',true);
        $vars['items']=$allItems->slice(0,8);

        $this->setContent(view('public.index',$vars));
        return $this->main();
    }

    public function showMore(Request $request)
    {
        //image, date, title, description, place, city, priceBefore, payLink, eventUrl
        $id = null;
        if($request->has('dataId')){
            $id = $request->get('dataId');
        }
        $data=[];
        if($id !== null){
            $savedData = $this->itemRepository->newPosters()->offset($id)->limit(4)->get();
//            $countData = $this->itemRepository->newPosters()->count();
            foreach ($savedData as $item){
                $send = [
                    'title'=>$item->lang->getAttribute('title'),
                    'description'=>$item->lang->getAttribute('short_description'),
                    'place'=> $item->place===null?'':$item->place->getAttribute('title'),
                    'city'=> $item->city===null?'':$item->city->getAttribute('title'),
                    'priceBefore'=> getTranslate('price_before.events',[$item->price_before??'']),
                    'payLink'=> $item->getAttribute('pay_link'),
                    'eventUrl'=>route('events.show',$item),
                    'image'=>GetPathToPhoto(Arr::first($item->images)->path??''),
                    'date'=>$item->getAttribute('date'),
                ];


                array_push($data,$send);
            }
        }
        return response($data,200);

    }
}
