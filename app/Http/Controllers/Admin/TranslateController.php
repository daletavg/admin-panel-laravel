<?php

namespace App\Http\Controllers\Admin;

use App\Models\Translate\Translate;
use App\Repository\TranslateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TranslateController extends AdminController
{
    protected $translateRepository;

    public function __construct()
    {
        $this->translateRepository= new TranslateRepository(app());
    }

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

        $transalteRepository = new TranslateRepository(app());
        $transalte = $transalteRepository->create($nonLocalizeData);
        $transalteRepository->createLangData($transalte->id, $data);
        $transalteRepository->addTranslate($transalte);
//        $transalte = (new Translate())->fill($nonLocalizeData);
//        $transalte->save();
//        $transalte->saveLang($data);

//        $tr = new TranslateRepository();
//        $tr->addTranslate($transalte);

        if ($request->has('saveClose')) {
            return redirect()->route('admin.translate.index')->with('success', 'Запись успешно создана!');
        }

        return redirect()->route('admin.translate.edit', $transalte)->with('success', 'Запись успешно создана!');

    }

    /**
     * @param int $id
     */
    public function edit(int $id)
    {
        //$checkGroup
        $vars['edit'] = ((app()));
        $vars['groups'] = Translate::getGroups();
        $this->setCardTitle('Редактирование локализации');

        $this->setContent(view('admin.translates.edit', $vars));
        return $this->main();
    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        $data = $request->get('data');
        $nonLocalizeData = $request->except('data', '_token');
        $translateRepository = new TranslateRepository(app());
        $oldKey = getTranslateKey($translateRepository->find($id));

        $translate = $translateRepository->update($nonLocalizeData, $id);
        $translateRepository->updateLang($id, $data);
        $translateRepository->updateTranslate($oldKey, $translate);


        if ($request->has('saveClose')) {
            return redirect()->route('admin.translate.index')->with('success', 'Запись успешно создана!');
        }

        return redirect()->route('admin.translate.edit', $translate)->with('success', 'Запись успешно создана!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $translateRepository = new TranslateRepository(app());
        $translateRepository->delete($id);
        return redirect()->route('admin.translate.index')->with('success', 'Запись успешно удалена!');
    }

}
