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
        parent::__construct();
        $this->itemRepository = $requestsRepository;
    }

    public function index()
    {
        $this->setCardTitle(__('admin.feedback'));
        $this->itemRepository->pushCriteria(new OrderByDescCriteria());
        $vars['items'] = $this->itemRepository->paginate(15);
//        dd($vars['items']);
        return view('admin.feedback.index',$vars);
    }

    public function destroy(int $id){
        $this->itemRepository->delete($id);
        return redirect()->back()->with('success',__('admin.row.delete'));
    }
}
