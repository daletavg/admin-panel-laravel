<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Redirect;
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
        $vars['items']= Redirect::paginate(15);
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

        $redirect = (new Redirect())->fill($data);
        $redirect->save();

        if($request->has('saveClose')){
            return redirect()->route('admin.seo.redirects.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.seo.redirects.edit',$redirect)->with('success','Запись успешно создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
