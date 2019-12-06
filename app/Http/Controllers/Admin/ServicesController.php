<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Repository\Criterias\SortCriteria;
use App\Repository\ServicesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends AdminController
{
    public function __construct(ServicesRepository $servicesRepository)
    {
        parent::__construct();
        $this->itemRepository= $servicesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setCardTitle(__('admin.setvices.service'));
        $this->itemRepository->pushCriteria(new SortCriteria());
        $vars['items']= $this->itemRepository->all()->load('lang');
        return view('admin.service.index',$vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setCardTitle(__('admin.setvices.create'));
        $vars = $this->setLanguagesData('admin.service.partials.lang-form',$this->itemRepository->langModel());
        return view('admin.service.create',$vars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service =$this->itemRepository->create([]);
        $data = $request->get('data');
        $this->itemRepository->createLangData($service->getAttribute('id'),$data);

        if ($request->has('saveClose')) {
            return redirect()->route('admin.services.index')->with('success',__('admin.row.create'));
        }

        return redirect()->route('admin.services.edit', $service)->with('success', __('admin.row.create'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setCardTitle(__('admin.setvices.edit'));
        $vars['edit']=$this->itemRepository->find($id)->load('langs.language');
        $vars += $this->setLanguagesData('admin.service.partials.lang-form',$this->itemRepository->langModel(),$vars['edit']->getAttribute('langs'));
        return view('admin.service.edit',$vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service =$this->itemRepository->find($id);
        $data = $request->get('data');
        $this->itemRepository->updateLang($service->getAttribute('id'),$data);

        if ($request->has('saveClose')) {
            return redirect()->route('admin.services.index')->with('success',__('admin.row.edit'));
        }

        return redirect()->route('admin.services.edit', $service)->with('success', __('admin.row.edit'));

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
        return redirect()->route('admin.services.index')->with('success', __('admin.row.delete'));

    }
}
