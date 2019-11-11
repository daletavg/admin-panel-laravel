@php

    if(isset($edit))
    {
        $langs = $edit->langs()->get()->toArray();
    }
    $dataLang = [];
    foreach (\App\Repository\LanguageRepository::getLanguage() as $key=>$lng)
    {
        array_push($dataLang,view('admin.seo.meta.partials.lang-form',
        [
            'langName'=>$lng->name,


            'h1Name'=>'data['.$lng->locale.'][h1]',
            'h1Value'=>$langs[$key]['h1']??'',

            'metaName'=>'data['.$lng->locale.'][title]',
            'metaValue'=>$langs[$key]['title']??'',

            'keywordsName'=>'data['.$lng->locale.'][keywords]',
            'keywordsValue'=>$langs[$key]['keywords']??'',

            'descriptionName'=>'data['.$lng->locale.'][description]',
            'descriptionValue'=>$langs[$key]['description']??'',

            'headName'=>'data['.$lng->locale.'][header]',
            'headValue'=>$langs[$key]['header']??'',

            'footerName'=>'data['.$lng->locale.'][footer]',
            'footerValue'=>$langs[$key]['footer']??'',

            'upTextName'=>'data['.$lng->locale.'][text_top]',
            'upTextValue'=>$langs[$key]['text_top']??'',

            'downTextName'=>'data['.$lng->locale.'][text_bottom]',
            'downTextValue'=>$langs[$key]['text_bottom']??'',
        ]
        ));
    }

@endphp


@include('admin.layouts.partials.tabs.lang-tab',['tabs'=>$dataLang])
