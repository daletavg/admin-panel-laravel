<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TranslateRequest;
use App\Models\Translate\Translate;
use App\Repository\TranslateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TranslateController extends AdminController
{


    public function __construct(TranslateRepository $redirectsRepository)
    {
        parent::__construct();
        $this->itemRepository = $redirectsRepository;

    }

    public function index()
    {
        $this->setCardTitle(__('admin.localization'));
        $vars['groups'] = Translate::getGroups();

        return view('admin.translates.index',$vars);
    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        if (!auth()->user()->can('create_translate')) {
            return redirect()->back();
        }
        $this->setCardTitle('Создание локализации');
        $vars['groups'] = Translate::getGroups();
        if ($request->has('group')) {
            $vars['checkGroup'] = $request->get('group');
        }

        $vars+=$this->setLanguagesData('admin.translates.partials.lang-form',$this->itemRepository->langModel());
        return view('admin.translates.create', $vars);
    }

    public function store(TranslateRequest $request)
    {
        $data = $request->get('data');
        $nonLocalizeData = $request->except('data', '_token');

        $transalte = $this->itemRepository->create($nonLocalizeData);
        $this->itemRepository->createLangData($transalte->id, $data);
        $this->itemRepository->addTranslate($transalte);

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
        if (!auth()->user()->can('edit_translate')) {
            return redirect()->back();
        }
        $vars['edit'] = $this->itemRepository->find($id);
        $vars['groups'] = Translate::getGroups();
        $this->setCardTitle('Редактирование локализации');
        $vars += $this->setLanguagesData('admin.translates.partials.lang-form',$this->itemRepository->langModel(),$vars['edit']->langs);
        return view('admin.translates.edit', $vars);
    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function update(TranslateRequest $request, int $id)
    {
        if (!auth()->user()->can('edit_translate')) {
            return redirect()->back();
        }
        $data = $request->get('data');
        $nonLocalizeData = $request->except('data', '_token');

        $oldKey = getTranslateKey($this->itemRepository->find($id));

        $translate = $this->itemRepository->update($nonLocalizeData, $id);
        $this->itemRepository->updateLang($id, $data);
        $this->itemRepository->updateTranslate($oldKey, $translate);


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
        if (!auth()->user()->can('remove_translate')) {
            return redirect()->back();
        }
        $this->itemRepository->delete($id);
        return redirect()->route('admin.translate.index')->with('success', 'Запись успешно удалена!');
    }

}
