<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repository\Criterias\OrderByDescCriteria;
use App\Repository\RequestsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends AdminController
{
    public function __construct(RequestsRepository $requestsRepository)
    {
        $this->itemRepository = $requestsRepository;
    }

    public function index()
    {
        $this->setCardTitle('Заявки обратной связи');
        $this->itemRepository->pushCriteria(new OrderByDescCriteria());
        $vars['items'] = $this->itemRepository->paginate(15);
//        dd($vars['items']);
        $this->setContent(view('admin.feedback.index',$vars));
        return $this->main();
    }
}
