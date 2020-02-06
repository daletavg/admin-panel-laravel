<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Model;
use App\Repository\MenuRepository;
use Illuminate\Http\RedirectResponse;


abstract class AdminController extends BaseController
{
    protected $itemRepository;
    protected $basePath;

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

    /**
     * @param $menu
     */
    private function setMenu($menu)
    {
        $this->setDataOnBaseView(['menu' => $menu]);
    }

    /**
     * @return string
     */
    public function getViewName(string $path):string
    {
        return $this->basePath.'.'.$path;
    }

    /**
     * @param string $status
     * @param string $message
     * @param $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(string $status,string $message, $data,$route = null):RedirectResponse
    {
        if (request()->has('saveClose')) {
            if($route !== null){
                return redirect()->route($route, $data)->with($status, $message);
            }
            return redirect()->route($this->basePath.'.index')->with($status,$message);
        }
        return redirect()->route($this->basePath.'.edit', $data)->with($status, $message);
    }

    /**
     * @param string $status
     * @param $message
     * @return RedirectResponse
     */
    public function redirectBack(string $status,$message):RedirectResponse
    {
        return redirect()->back()->with($status, $message);
    }

    public function setCustomBreadcrumbs(string $breadName,string $breadTitle)
    {
        $this->setDataOnBaseView(['breadName'=>$breadName,'breadTitle'=>$breadTitle]);
    }
}
