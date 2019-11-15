<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\RedirectsRequest;
use App\Models\Redirect;
use App\Repository\RedirectsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedirectsController extends AdminController
{

    /**
     * RedirectsController constructor.
     * @param RedirectsRepository $redirectsRepository
     */
    public function __construct(RedirectsRepository $redirectsRepository)
    {
        $this->itemRepository = $redirectsRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->setCardTitle('Перенаправления');


        $vars['items']= $this->itemRepository->paginate(15);
        $this->setContent(view('admin.seo.redirects.index',$vars));
        return $this->main();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setCardTitle('Создание перенаправления');
        $vars['codes'] = Redirect::getCodes();
        $this->setContent(view('admin.seo.redirects.create',$vars));

        return $this->main();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RedirectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RedirectsRequest $request)
    {
        $data = $request->except('_token');

        $data['from']= getUrlWithoutHost($data['from']);
        $data['to']= getUrlWithoutHost($data['to']);
        $data['active'] = isActive($data);


        $redirect =$this->itemRepository->create($data);


        if($request->has('saveClose')){
            return redirect()->route('admin.seo.redirects.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.seo.redirects.edit',$redirect)->with('success','Запись успешно создана!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vars['edit']=$this->itemRepository->find($id);
        $vars['codes'] = Redirect::getCodes();
        $this->setCardTitle('Редактирование перенаправления');
        $this->setContent(view('admin.seo.redirects.edit',$vars));
        return $this->main();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RedirectsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RedirectsRequest $request, $id)
    {
        $data =  $request->except('_token','_method');
        $data['from']= getUrlWithoutHost($data['from']);
        $data['to']= getUrlWithoutHost($data['to']);
        $data['active'] = isActive($data);
        $redirect =$this->itemRepository->update($data,$id);
        if($request->has('saveClose')){
            return redirect()->route('admin.seo.redirects.index')->with('success','Запись успешно обновлена!');
        }

        return redirect()->route('admin.seo.redirects.edit',$redirect)->with('success','Запись успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->itemRepository->delete($id);
        return redirect()->route('admin.seo.redirects.index')->with('success','Запись успешно удалена!');
    }
}
