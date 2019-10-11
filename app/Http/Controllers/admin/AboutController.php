<?php

namespace App\Http\Controllers\admin;

use App\Models\About;
use App\Models\AboutLang;
use App\Models\Language;
use App\Repository\LanguageRepository;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $vars = [];
        $about = About::with('langs')->first();

        if(is_null($about))
        {
            LanguageRepository::getLanguage();
            $about = new About();
            $about->save();
            foreach (LanguageRepository::getLanguage() as $lang)
            {
                $aboutLang = new AboutLang();
                $aboutLang->language()->associate($lang);
                $about->lang()->save($aboutLang);
            }
        }
        $vars['edit']=$about;
        $data['cardTitle']='О компании';
        $data['content']=view('admin.about.index',$vars);
        return $this->main($data);
    }
    public function update(Request $request)
    {
        $about = About::with('lang')->first();
        $langData = $request->get('data');
        foreach ($langData as $langKey => $data)
        {
            $about->lang($langKey)->first()->update($data);
        }
        return redirect()->back()->with('success','Запись успешно отредактирована!');
    }
}
