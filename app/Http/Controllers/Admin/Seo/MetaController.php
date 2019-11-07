<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\MetaRequest;
use App\Models\Language;
use App\Models\Meta\Meta;
use App\Models\Meta\MetaLang;
use App\Repositories\MetaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetaController extends AdminController
{

    public function index()
    {
        $this->setCardTitle('Мета');
        $vars['items'] = Meta::WithLang()->paginate(15);

        $this->setContent(view('admin.seo.meta.index', $vars));

        return $this->main();
    }


    public function create()
    {
        $this->setCardTitle('Создание');
        $this->setContent(view('admin.seo.meta.create'));
        return $this->main();
    }

    public function store(Request $request)
    {
        $metaWithoutLang = $request->except('data','_token');
        $metaWithoutLang['url'] = getUrlWithoutHost($metaWithoutLang['url']);
        $metaWithoutLang['power']=isActive($metaWithoutLang);
        $metaWithoutLang['type']=0;
        $meta  =  (new Meta())->fill($metaWithoutLang);
        $meta->save();
        $meta->saveLang($request->get('data'));



        if($request->has('saveClose')){
            return redirect()->route('admin.seo.meta.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.seo.meta.edit',$meta)->with('success','Запись успешно создана!');

    }

    /**
     * @param Meta $mete
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Meta $meta)
    {
        $edit = $meta->load('langs');
        $title =
        $this->setTitle($title)->addBreadCrumb($title);
        $data['content'] = view('admin.meta.edit', compact('edit'));

        return $this->main($data);
    }

    public function update(MetaRequest $request, Meta $meta)
    {
        $input = $request->all();
        $meta->fillExisting($input);
        if ($meta->save()) {
            $meta->lang()->first()->fillExisting($input)->save();
            $this->setSuccessUpdate();
        }
        if ($request->has('saveClose')) {
            return redirect($this->resourceRoute('index'))->with($this->getResponseMessage());
        }

        return redirect()->back()->with($this->getResponseMessage());
    }

    public function destroy(Meta $meta)
    {
        if ($meta->delete()) {
            $this->setSuccessDestroy();
        }

        return redirect($this->resourceRoute('index'))->with($this->getResponseMessage());
    }
}
