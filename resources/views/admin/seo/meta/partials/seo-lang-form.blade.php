@php
    $allLocales = \Illuminate\Support\Arr::pluck(\App\Repository\LanguageRepository::getLanguage(),'locale','name');

    if(isset($edit))
    {
        $edit = $edit->langs->sortBy('language.id');
    }

    $dataLang = [];

    foreach ($allLocales as $nameLocale =>$locale)
    {
        $data = isset($edit)?$edit->where('language.locale',$locale)->first():null;

        $dataLang +=
        [
        $locale=>view('admin.seo.meta.partials.lang-form',

        [
            'langName'=>$nameLocale,

            'h1Name'=>'data['.$locale.'][h1]',
            'h1Value'=>is_null($data)?'':$data->getAttribute('h1'),

            'metaName'=>'data['.$locale.'][title]',
            'metaValue'=>is_null($data)?'':$data->getAttribute('title'),

            'keywordsName'=>'data['.$locale.'][keywords]',
            'keywordsValue'=>is_null($data)?'':$data->getAttribute('keywords'),

            'descriptionName'=>'data['.$locale.'][description]',
            'descriptionValue'=>is_null($data)?'':$data->getAttribute('description'),

            'headName'=>'data['.$locale.'][header]',
            'headValue'=>is_null($data)?'':$data->getAttribute('header'),

            'footerName'=>'data['.$locale.'][footer]',
            'footerValue'=>is_null($data)?'':$data->getAttribute('footer'),

            'upTextName'=>'data['.$locale.'][text_top]',
            'upTextValue'=>is_null($data)?'':$data->getAttribute('text_top'),

            'downTextName'=>'data['.$locale.'][text_bottom]',
            'downTextValue'=>is_null($data)?'':$data->getAttribute('text_bottom'),
        ]
        )];


    }


@endphp


@include('admin.layouts.partials.tabs.lang-tab',['locales'=>$allLocales,'tabs'=>$dataLang])
