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
        $vars['items'] = Meta::WithLang()->MetaWithoutDefault()->paginate(15);
        $vars['edit']=Meta::DefaultMeta();
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
        $metaWithoutLang['active']=isActive($metaWithoutLang);
        $metaWithoutLang['type']=Meta::ONLY_ONE_PAGE_TYPE;
        $meta  =  (new Meta())->fill($metaWithoutLang);
        $meta->save();
        $meta->saveLang($request->get('data'));



        if($request->has('saveClose')){
            return redirect()->route('admin.seo.meta.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.seo.meta.edit',$meta)->with('success','Запись успешно создана!');

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $vars['edit'] = Meta::find($id)->load('langs');
        $this->setCardTitle('Редактирование');
        $this->setContent(view('admin.seo.meta.edit', $vars));

        return $this->main();
    }

    public function update(Request $request,int $id)
    {
        $meta = Meta::find($id);
        $meta->update($request->except('data','_token','_method')+['active'=>isActive($request->except('data','_token','_method'))]);
        $meta->updateLang($request->get('data'));

        if ($request->has('saveClose')) {
            return redirect($this->resourceRoute('index'))->with($this->getResponseMessage());
        }

        if($request->has('saveClose')){
            return redirect()->route('admin.seo.meta.index')->with('success','Запись успешно изменена!');
        }

        return redirect()->route('admin.seo.meta.edit',$meta)->with('success','Запись успешно изменена!');

    }


    public function destroy(int $id)
    {
        $meta = Meta::find($id);
        $meta->delete();

        return redirect()->route('admin.seo.meta.index')->with('success','Запись успешно удалена!');
    }


    public function storeDefaultMeta(Request $request)
    {
        if(($meta = Meta::DefaultMeta())===null) {
            $meta = new Meta([
                'type' => Meta::DEFAULT_TYPE,
                'url' => '*',
                'active'=>true
            ]);
            $meta->save();
            $meta->saveLang($request->get('data'));
        }
        else{
            $meta->updateLang($request->get('data'));
        }
        return redirect()->route('admin.seo.meta.index')->with('success','Мата по умолчанию установленна!');
    }
}
