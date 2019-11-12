<?php

namespace App\Http\Controllers\Admin;

use App\Models\Translate\Translate;
use App\Repository\TranslateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TranslateController extends AdminController
{
    public function index()
    {
        $this->setCardTitle('Локализация');
        $vars['groups'] = Translate::getGroups();

        $this->setContent(view('admin.translates.index', $vars));
        return $this->main();
    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $this->setCardTitle('Создание локализации');
        $vars['groups'] = Translate::getGroups();

        $this->setContent(view('admin.translates.create', $vars));
        return $this->main();
    }

    public function store(Request $request)
    {
        $data = $request->get('data');
        $nonLocalizeData = $request->except('data', '_token');
        $transalte = (new Translate())->fill($nonLocalizeData);
        $transalte->save();
        $transalte->saveLang($data);

        $tr = new TranslateRepository();
        $tr->addTranslate($transalte);

        if($request->has('saveClose')){
            return redirect()->route('admin.translate.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.translate.edit',$transalte)->with('success','Запись успешно создана!');

    }

    /**
     * @param Translate $translate
     */
    public function edit(Translate $translate)
    {
        //$checkGroup
        $vars['edit'] = $translate->load('langs');
        $vars['groups'] = Translate::getGroups();
        $this->setCardTitle('Редактирование локализации');

        $this->setContent(view('admin.translates.edit', $vars));
        return $this->main();
    }

    /**
     * @param Request $request
     * @param Translate $translate
     */
    public function update(Request $request, Translate $translate)
    {
        $data = $request->get('data');
        $nonLocalizeData = $request->except('data', '_token');
        $oldKey = getTranslateKey($translate);
        $translate = $translate->load('langs');
        $translate->fill($nonLocalizeData);
        $translate->save();
        $translate->updateLang($data);

        $tr = new TranslateRepository();
        $tr->updateTranslate($oldKey,$translate);

        if($request->has('saveClose')){
            return redirect()->route('admin.translate.index')->with('success','Запись успешно создана!');
        }

        return redirect()->route('admin.translate.edit',$translate)->with('success','Запись успешно создана!');
    }

    public function destroy(Translate $translate)
    {
        $translate->delete();
        return redirect()->route('admin.translate.index')->with('success','Запись успешно удалена!');
    }

}
