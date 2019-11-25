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
    public function __construct(MetaRepository $metaRepository)
    {
        $this->itemRepository=$metaRepository;
    }

    public function index()
    {
        $this->setCardTitle('Мета');
        $vars['items'] = $this->itemRepository->metaWithLang()->paginate(15);
        $vars['edit']=$this->itemRepository->getDefaultMeta();
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

        $item = $this->itemRepository->create($metaWithoutLang);
        $data = $request->get('data');
        $this->itemRepository->createLangData($item->id,$data);
        $this->itemRepository->addCache($item);




        if($request->has('saveClose')){
            return redirect()->route('admin.seo.meta.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.seo.meta.edit',$item)->with('success','Запись успешно создана!');

    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $vars['edit'] = $this->itemRepository->find($id)->load('langs');
        $this->setCardTitle('Редактирование');
        $this->setContent(view('admin.seo.meta.edit', $vars));

        return $this->main();
    }

    public function update(Request $request,int $id)
    {

        $nonLocalizedData = $request->except('data','_token','_method')+['active'=>isActive($request->except('data','_token','_method'))];
        $item = $this->itemRepository->update($nonLocalizedData,$id);
        $oldUrl = $item->getAttribute('url');
        $this->itemRepository->updateLang($item->id,$request->get('data'));
        $this->itemRepository->updateCache($oldUrl,$item);


        if($request->has('saveClose')){
            return redirect()->route('admin.seo.meta.index')->with('success','Запись успешно изменена!');
        }

        return redirect()->route('admin.seo.meta.edit',$item)->with('success','Запись успешно изменена!');

    }


    public function destroy(int $id)
    {
        $this->itemRepository->delete($id);


        return redirect()->route('admin.seo.meta.index')->with('success','Запись успешно удалена!');
    }


    public function storeDefaultMeta(Request $request)
    {
        if(($meta = $this->itemRepository->getDefaultMeta())===null) {
            $nonLocalizedData = [
                'type' => Meta::DEFAULT_TYPE,
                'url' => '*',
                'active'=>true
            ];
            $data =$request->get('data');
            $item = $this->itemRepository->create($nonLocalizedData);
            $oldUrl = $item->getAttribute('url');
            $this->itemRepository->createLangData($item->id,$data);
            $this->itemRepository->updateCache($oldUrl,$item);
        }
        else{
            $data = $request->get('data');
            $oldUrl = $meta->getAttribute('url');
            $this->itemRepository->updateLang($meta->id,$data);
            $this->itemRepository->updateCache($oldUrl,$meta);
        }
        return redirect()->route('admin.seo.meta.index')->with('success','Мeта по умолчанию установленна!');
    }
}
