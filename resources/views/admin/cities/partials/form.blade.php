@php
    if(isset($edit))
    {
        $langs = $edit->langs()->get()->toArray();
    }
    $dataLang = [];
    array_push($dataLang,
    view('admin.cities.partials.lang-form',['langName'=>'Русский','titleName'=>'data[ru][title]','titleValue'=>$langs[0]['title']??'']),
    view('admin.cities.partials.lang-form',['langName'=>'Украинский','titleName'=>'data[uk][title]','titleValue'=>$langs[1]['title']??'']),
    view('admin.cities.partials.lang-form',['langName'=>'Английский','titleName'=>'data[en][title]','titleValue'=>$langs[2]['title']??''])
);
@endphp

@include('admin.layouts.partials.tabs.lang-tab',['tabs'=>$dataLang])
