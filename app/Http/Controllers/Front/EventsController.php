<?php

namespace App\Http\Controllers\Front;

use App\Repository\PostersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class EventsController extends SiteController
{
    public function __construct(PostersRepository $postersRepository)
    {
        $this->itemRepository = $postersRepository;
    }

    public function show(string $url)
    {
        $vars['item'] = $this->itemRepository->findByUrl($url);
//        dd($vars['items']);
        $this->setContent(view('public.event.index', $vars));
        return $this->main();
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:150'
        ]);
        if (!$request->ajax()) {
            return redirect()->back();
        }

        $search = $request->get('search');
        $data = $this->itemRepository->search($search, true, null)->get();

        $response = [];
        foreach ($data as $item)
        {
            $cityPlaceStr = $item->city !== null?$item->city->lang->title:'';
            $cityPlaceStr .=$item->place!== null?','.$item->place->lang->title:'';

            array_push($response,[
                'title' => $item->lang->title??'',
                'date' => $item->date??'',
                'image' => GetPathToPhoto(Arr::first($item->images)->path??''),
                'place'=>$cityPlaceStr,
                'url' => route('events.show',$item->url),
            ]);
        }

        return response($response,200);
    }
}
