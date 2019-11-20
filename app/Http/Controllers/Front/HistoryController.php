<?php

namespace App\Http\Controllers\Front;

use App\Models\Poster\Poster;
use App\Repository\PostersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends SiteController
{
    public function __construct(PostersRepository $postersRepository)
    {
        $this->itemRepository = $postersRepository;
    }

    public function index()
    {
        $vars['items']=$this->itemRepository->history()->paginate(8);
        $vars['isHistory'] = true;
        $this->setContent(view('public.history',$vars));
        return $this->main();
    }
}
