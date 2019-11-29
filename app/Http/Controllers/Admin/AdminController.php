<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Model;
use App\Repository\MenuRepository;


abstract class AdminController extends BaseController
{
    protected $itemRepository;

    public function __construct()
    {
        $thisData = $this;
        $this->middleware(function ($request, $next) use ($thisData)
        {
            $thisData->addDataToBaseView();
            $thisData->setBaseViewName('admin.layouts.app');
            $thisData->setMenu(MenuRepository::getMenu());

            return $next($request);
        });

    }

    protected function addDataToBaseView(){}


    /**
     * @param string|null $view
     * @param string $modelClass
     * @param null $edit
     * @param array $props
     * @return array
     */
    protected function setLanguagesData(string $view, string $modelClass, $edit = null, array $props = null)
    {
        /* @var Model $model */
        $model = new $modelClass();
        $allLocales = \Illuminate\Support\Arr::pluck(\App\Repository\LanguageRepository::getLanguage(), 'locale', 'name');

        if (!is_null($edit)) {
            $edit = $edit->sortBy('language.id');
        }
        $dataLang = [];

        foreach ($allLocales as $nameLocale => $locale) {
            $data = isset($edit) ? $edit->where('language.locale', $locale)->first() : null;

            $currentLanguage = ['langName' => $nameLocale];

            foreach ($model->getFillable() as $item) {
                $currentLanguage += [
                    $item . 'Name' => 'data[' . $locale . '][' . $item . ']',
                    $item . 'Value' => is_null($data) ? '' : $data->getAttribute($item),
                ];
            }
            $viewShow = null;
            if ($props !== null) {
                $viewShow = view($view, $currentLanguage)->with($props);
            } else {
                $viewShow = view($view, $currentLanguage);
            }
            $dataLang += [$locale => $viewShow];


        }
        $returnData =[
            'langData' =>
                view('admin.layouts.partials.tabs.lang-tab', [
                    'locales' => $allLocales,
                    'tabs' => $dataLang,
                ])
        ];
        return $returnData;


    }

    protected function setCardTitle(string $title): void
    {
        $this->setDataOnBaseView(['cardTitle' => $title]);
    }


    private function setMenu($menu)
    {
        $this->setDataOnBaseView(['menu' => $menu]);
    }


}
