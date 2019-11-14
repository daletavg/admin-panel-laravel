<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Redirect;
use App\Repository\RedirectsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedirectsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setCardTitle('Перенаправления');


        $rd = new RedirectsRepository(app());
        $vars['items']= $rd->paginate(15);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $data['from']= getUrlWithoutHost($data['from']);
        $data['to']= getUrlWithoutHost($data['to']);
        $data['active'] = isActive($data);

        $rd = new RedirectsRepository(app());
        $redirect =$rd->create($data);


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
        $rd = new RedirectsRepository(app());
        $vars['edit']=$rd->find($id);
        $vars['codes'] = Redirect::getCodes();
        $this->setCardTitle('Редактирование перенаправления');
        $this->setContent(view('admin.seo.redirects.edit',$vars));
        return $this->main();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rd = new RedirectsRepository(app());
        $data =  $request->except('_token','_method');
        $data['from']= getUrlWithoutHost($data['from']);
        $data['to']= getUrlWithoutHost($data['to']);
        $data['active'] = isActive($data);
        $redirect =$rd->update($data,$id);
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
        $rd = new RedirectsRepository(app());
        $rd->delete($id);
        return redirect()->route('admin.seo.redirects.index')->with('success','Запись успешно удалена!');
    }
}
