<?php

namespace App\Http\Controllers\Admin;

use App\Repository\BannersRepository;
use App\Http\Requests\BannerRequest;
use App\Repository\Criterias\SortCriteria;


class BannersController extends AdminController
{

    public function __construct(BannersRepository $bannersRepository)
    {
        parent::__construct();
        $this->itemRepository = $bannersRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setCardTitle(__('admin.banner.banner'));
        $this->itemRepository->pushCriteria(new SortCriteria());
        $vars['items']=$this->itemRepository->all()->load('image');
        return view('admin.banner.index',$vars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setCardTitle(__('admin.banner.create'));
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $banner = $this->itemRepository->create([]);
        $id = $banner->getAttribute('id');
        $this->itemRepository->saveImage($id,$request);

        if ($request->has('saveClose')) {
            return redirect()->route('admin.banners.index')->with('success',__('admin.row.create'));
        }

        return redirect()->route('admin.banners.edit', $banner)->with('success', __('admin.row.create'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setCardTitle(__('admin.banner.edit'));
        $vars['edit'] = $this->itemRepository->find($id)->load('image');

        return view('admin.banner.edit',$vars);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BannerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $this->itemRepository->saveImage($id,$request);

        if ($request->has('saveClose')) {
            return redirect()->route('admin.banners.index')->with('success',__('admin.row.create'));
        }

        return redirect()->route('admin.banners.edit', $id)->with('success', __('admin.row.create'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->itemRepository->deleteImage($id);
        $this->itemRepository->delete($id);
        return redirect()->route('admin.banners.index')->with('success', __('admin.row.delete'));
    }
}
